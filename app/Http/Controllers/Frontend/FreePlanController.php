<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 13.05.2019
 * Time: 11:15
 */

namespace App\Http\Controllers\Frontend;

// Libraries
use App, Redirect, Auth, DB, Input, Validator, Hash, Session, Request, Mail;

use App\Http\Controllers\Controller;

use App\Classes\UsersClass;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\DatabaseModels\PlanDocs;
use App\DatabaseModels\PlansTypes;
use App\DatabaseModels\PlansMilestone;
use App\DatabaseModels\MangoPayout;
use App\DatabaseModels\Companies;
use App\DatabaseModels\CompaniesBank;
use App\DatabaseModels\CompaniesMangowallets;
use App\DatabaseModels\ClientsMangowallets;
use App\DatabaseModels\Users;
use App\Classes\MangoClass;
use App\Classes\MessagesClass;
use App\Classes\StateClass;
use App\Classes\CompanyClass;



class FreePlanController extends Controller
{

    function create(){

        $blade["locale"] = App::getLocale();
        $types = PlansTypes::lists("name", "id");

        $type = $_POST['freelancer'];
        $amount = $_POST['amount'];
        $cur = $_POST['cur'];
        $plantype = $_POST['type'];


        return view('frontend.plan', compact('blade', 'types', 'company', 'plan', 'type', 'amount', 'cur', 'plantype'));
    }


    public function getPlanByTyp(){

        $input = Request::all();

        if(isset($input['typedit'])){

            $milestones = PlansMilestone::where("projects_plans_id_fk", "=", $input['typedit'])
                ->first();

            if(isset($milestones->typ) && $milestones->typ == 1){
                return view('frontend.plan_deposit', compact('blade', 'clients', 'plan', 'milestones'));
            }else{
                return view('frontend.plan_milestones', compact('blade', 'clients', 'plan', 'milestones'));
            }

        }else{

            if(isset($input['typ']) && $input['typ'] == 1){
                return view('frontend.plan_deposit', compact('blade', 'clients', 'plan'));
            }else{
                return view('frontend.plan_milestones', compact('blade', 'clients', 'plan'));
            }

        }

    }

    public function save(Request $request) {

        $blade["ll"] = App::getLocale();
        $input = Request::all();

        if($_POST['radio-new'] == 1){

        }else{

            $usersObj = new UsersClass();
            $response = $usersObj->saveUser($_POST);

            if($response == false){
                return back()->withInput()->with('error', 'E-Mail already taken.');
            }else{
                $user = Users::where("email", "=", $response['email'])->first();
                $company = new Companies();
                $company->users_fk = $user->id;
                $company->save();
            }

        }




        $clients = new Clients();
        $clients->email = $input['client-email'];
        $clients->save();

        $plan = new Plans();
        $plan->clients_id_fk = $clients->id;

        $plan->service_provider_fk = $company->id;

        if(isset($input['title']))
            $plan->name = $input['title'];

        //if(isset($input['reference']))
        //    $plan->reference = $input['reference'];

        //if(isset($input['projects-dropdown']))
        //    $plan->projects_id_fk = $input['projects-dropdown'];


        $plan->date = date("Y-m-d");

        //if(isset($input['creation-date']) && $input['creation-date']!=""){
        //    $creation = date("Y-m-d", strtotime($input['creation-date']) );
        //    $plan->date = $creation;
        //}

        if(isset($input['typ']))
            $plan->typ = $input['typ'];

        if(isset($input['comment']))
            $plan->comment = $input['comment'];

        if($plan->state < 2){
            $plan->state = 0;
        }

        $plan->hidden = 0;
        //$plan->hash = Hash::make(time());
        $plan->hash = time();
        $plan->save();


        //1 = Single Deposit
        if($input['typ'] == 1){

            $milestone = new PlansMilestone();
            $milestone->projects_plans_id_fk = $plan->id;


            if(isset($input['title-milestone'])){
                $milestone->name = $input['title-milestone'];
            }

            if(isset($input['desc-milestone'])){
                $milestone->desc = $input['desc-milestone'];
            }

            if(isset($input['single-amount'])){
                $milestone->amount = str_replace(',', '', $input['single-amount']);
            }

            if(isset($input['currency'])){
                $milestone->currency = $input['currency'];
            }

            if(isset($input['pay-due'])){
                $milestone->due_typ = $input['pay-due'];
            }

            $milestone->typ = $input['typ'];

            if(isset($input['pay-due']) && $input['pay-due'] == 3){

                $plan->date = date("Y-m-d");

                $milestone->due_at = $input['due-date'];
            }


            $milestone->credit_card = 1;
            $milestone->bank_transfer = 1;

            /*
            if(isset($input['cc']) && $input['cc']=="true"){
                $milestone->credit_card = 1;
            }else{
                $milestone->credit_card = 0;
            }

            if(isset($input['bt']) && $input['bt']=="true"){
                $milestone->bank_transfer = 1;
            }else{
                $milestone->bank_transfer = 0;
            }
            */

            $milestone->save();


        }else{

            foreach($input['name'] as $key => $value){

                $milestone = new PlansMilestone();
                $milestone->projects_plans_id_fk = $plan->id;
                $milestone->order = $key+1;
                $milestone->typ = 2;
                $milestone->name = $value;
                $milestone->amount = $input['amount'][$key];
                $milestone->currency = $input['currency'][$key];
                $milestone->desc = $input['description'][$key];
                $milestone->due_at = $input['due_date'][$key];


                /*
                if(isset($input['cc']) && $input['cc']=="true"){
                    $milestone->credit_card = 1;
                }else{
                    $milestone->credit_card = 0;
                }

                if(isset($input['bt']) && $input['bt']=="true"){
                    $milestone->bank_transfer = 1;
                }else{
                    $milestone->bank_transfer = 0;
                }
                */

                $milestone->credit_card = 1;
                $milestone->bank_transfer = 1;

                $milestone->save();
            }
        }



        $this->send($user, $plan, $clients);

        return back()->withInput()->with('success', 'The Payment Pan has been sent to your customer. You can log in <a href="/login" style="font-size: 12px; text-decoration: underline;">here</a> and manage the plan.');


    }


    public function send($user, $plan, $clients) {

        $lang = App::getLocale();
        $input = Request::all();

        $plan = Plans::where("id", "=", $plan->id)
            ->first();

        if($plan->state == 2){

            return response()->json([
                'message'   => 'Your Payment was already sent earlier.'

            ]);

        }else{
            $plan->state =  1;
            $plan->save();

            $milestones = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
                ->first();

            $client = Clients::where("id", "=", $clients->id)
                ->first();

            //$company = App\DatabaseModels\Companies::where("id", "=", $user->service_provider_fk)
              //  ->first();

            $to = $client->email;

            //$mango_obj = new MangoClass($this->mangopay);
            //$url=   $mango_obj->createTransaction($company, $client, $input['single-amount']);

            Mail::send('emails.homepage_plan', compact('data', 'client', 'company', 'user', 'plan', 'lang', 'milestones'), function ($message) use ($client, $milestones, $user, $to) {
                $message->from($user->email, $user->firstname." ".$user->lastname);
                $message->to($to);
                $message->subject("Trustfy - Payment Plan");
            });



            $subject = "Startseite: Payment Plan";

            Mail::send('emails.homepage_plan', compact('data', 'client', 'company', 'user', 'plan', 'lang', 'milestones'), function ($message) use ($subject, $milestones, $client, $user) {
                $message->from($user->email, $user->firstname." ".$user->lastname);
                $message->subject($subject);
                $message->to('bcc@trustfy.io');
            });

           return true;
        }

    }



}