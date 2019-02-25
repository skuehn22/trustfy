<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Redirect, Form, DB, MangoPay, Mail, Hash;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Projects;
use App\DatabaseModels\PlansTypes;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\Classes\StateClass;
use App\DatabaseModels\PlanDocs;
use App\DatabaseModels\PlansMilestone;

use App\Classes\MangoClass;
use Faker\Provider\Company;

class PlansManagementController extends Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    private $mangopay;

    public function __construct(\MangoPay\MangoPayApi $mangopay) {

        $this->mangopay = $mangopay;

    }

    public function index() {

        if (Auth::check()) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        $query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->where('projects_plans.service_provider_fk', '=', $blade["user"]->service_provider_fk );
        $query->where('projects_plans.state', '>', 0 );
        $query->where('projects_plans.delete', '=', 0 );
        $query->select('projects.name', 'clients.firstname', 'clients.lastname', 'clients.firstname', 'projects_plans.*');
        $plans = $query->get();

        $statusObj = new StateClass();

        foreach($plans as $plan) {
            $response =$statusObj->plans($plan->state);
            $plan->color =  $response['color'];
            $plan->state =  $response['state'];
        }


        return view('backend.freelancer.plans.overview', compact('blade', 'plans'));

    }
     else {

            return Redirect::to(env("MYHTTP"));
        }
    }

    public function create() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();


        if(isset($_POST['projects'])){

            $selected_project = Projects::where("id", "=", $_POST['projects'])
                ->where("delete", "=", "0")
                ->first();

            $projects = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->lists("name", "id");

        }else{



        }

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        $types = PlansTypes::where("delete", "=", "0")
        ->lists("name","id");

        $plan = new Plans();

        if($blade["user"]->service_provider_fk == 0){
            $plan->service_provider_fk = -1;
        }else{
            $plan->service_provider_fk = $blade["user"]->service_provider_fk;
        }

        $plan->hidden = 1;
        $plan->save();

        return view('backend.freelancer.plans.new', compact('blade', 'clients', 'plan', 'types', 'selected_project', 'projects'));

    }


    public function edit($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $plan = Plans::where("id", "=", $id)
            ->where("delete", "=", "0")
            ->first();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        $projects = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->lists("name", "id");

        $selected_project = Projects::where("id", "=", $plan->projects_id_fk)
            ->where("delete", "=", "0")
            ->first();

        $types = PlansTypes::where("delete", "=", "0")
            ->lists("name","id");

        $milestones_edit = PlansMilestone::where("projects_plans_id_fk", "=", $id)
            ->first();


        return view('backend.freelancer.plans.edit', compact('blade', 'clients', 'plan', 'projects', 'types', 'selected_project', 'milestones_edit'));

    }

    public function save(Request $request) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $plan = Plans::where("id", "=", $input['plan'])
            ->first();

        if(isset($input['clients']))
            $plan->clients_id_fk = $input['clients'];

        if(isset($input['title']))
            $plan->name = $input['title'];

        if(isset($input['projects-dropdown']))
            $plan->projects_id_fk = $input['projects-dropdown'];

        if(isset($input['creation-date'])){
            $creation = date("Y-m-d", strtotime($input['creation-date']) );
            $plan->date = $creation;
        }

        if(isset($input['typ']))
            $plan->typ = $input['typ'];

        if(isset($input['cc']) && $input['cc']=="true")
            $plan->credit_card = 1;

        if(isset($input['bt']) && $input['bt']=="true")
            $plan->bank_transfer = 1;

        if(isset($input['comment']))
            $plan->comment = $input['comment'];


        $plan->state = 1;
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
                $milestone->amount = $input['single-amount'];
            }

            if(isset($input['pay-due'])){
                $milestone->due_typ = $input['pay-due'];
            }

            $milestone->typ = $input['typ'];

            if(isset($input['pay-due']) && $input['pay-due'] == 3){
                $milestone->due_at = $input['due-date'];
            }

            $milestone->save();

        }else{

        }

        return response()->json([
            'message'   => 'Successfully saved'

        ]);

    }

    public function finishing($id) {

    }


    public function saveAndClose($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $plan = Plans::where("id", "=", $id)
            ->first();

        if(isset($input['clients']))
            $plan->clients_id_fk = $input['clients'];

        if(isset($input['creation-date']))
            $creation = date("Y-m-d", strtotime($input['creation-date']) );
            $plan->date = $creation;

        if(isset($input['typ']))
            $plan->typ = $input['typ'];

        if(isset($input['pay-due']))
            $plan->due_typ = $input['pay-due'];

        if(isset($input['due-date']))
            $dueDate = date("Y-m-d", strtotime($input['due-date']) );
            $plan->due_date = $dueDate;

        if(isset($input['single-amount']))
            $plan->amount = $input['single-amount'];

        if(isset($input['projects-dropdown']))
            $plan->projects_id_fk = $input['projects-dropdown'];

        $plan->state = 1;
        $plan->hidden = 0;
        $plan->save();

        return Redirect::to($blade["ll"]."/freelancer/plans/")->withInput()->with('success', 'Your payment plan has been created!');

    }

    public function delete($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $project = Plans::where("id", "=", $id)
            ->first();

        $project->delete = 1;
        $project->save();

        return Redirect::to($blade["ll"]."/freelancer/plans/")->withInput()->with('success', 'Payment plan successfully deleted');

    }

    public function getPlanByTyp(){

        $input = Request::all();

        if(isset($input['typedit'])){

            $milestones = PlansMilestone::where("projects_plans_id_fk", "=", $input['typedit'])
                ->first();

            if(isset($milestones->typ) && $milestones->typ == 1){
                return view('backend.freelancer.plans.payment-single', compact('blade', 'clients', 'plan', 'milestones'));
            }else{
                return view('backend.freelancer.plans.payment-milestones', compact('blade', 'clients', 'plan', 'milestones'));
            }

        }else{

            if(isset($input['typ']) && $input['typ'] == 1){
                return view('backend.freelancer.plans.payment-single', compact('blade', 'clients', 'plan'));
            }else{
                return view('backend.freelancer.plans.payment-milestones', compact('blade', 'clients', 'plan'));
            }

        }

    }


    public function send() {

        $lang = App::getLocale();
        $user = Auth::user();
        $input = Request::all();
        //$plan = $this->save($input);

        $plan = Plans::where("id", "=", $_GET['plan'])
            ->first();

        $client = Clients::where("id", "=", $_GET['clients'])
            ->first();

        $company = App\DatabaseModels\Companies::where("id", "=", $user->service_provider_fk)
            ->first();

        //$mango_obj = new MangoClass($this->mangopay);
        //$url=   $mango_obj->createTransaction($company, $client, $input['single-amount']);

        Mail::send('emails.client_paylink', compact('data', 'client', 'company', 'user', 'plan', 'lang'), function ($message) use ($client, $company) {
            $message->from('info@trustfy.io', 'Trustfy.io');
            $message->to($client->mail);
            $message->subject($company->name." - Payment Plan");
            $message->bcc("kuehn.sebastian@gmail.com");
        });



        return response()->json([
            'message'   => 'Your Payment Plan was send to your client'

        ]);

    }


    function getDocs(){

        $docs = PlanDocs::where('plan_id_fk', '=', $_GET['typ'] )
            ->where('delete', '=', '0' )
            ->get();

        return view('backend.freelancer.plans.docs', compact('blade', 'docs'));

    }

    function deleteDoc(){

        $docs = PlanDocs::where('id', '=', $_GET['variable'] )
            ->first();

        $docs->delete = 1;
        $docs->save();

        return $docs;

    }




}