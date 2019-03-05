<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:08
 */

namespace App\Http\Controllers\Frontend;

// Libraries
use App, Redirect, Auth, DB, Input, Validator;

use App\Http\Controllers\Controller;


use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\DatabaseModels\PlanDocs;
use App\DatabaseModels\UsersPaymentPlan;
use App\DatabaseModels\PlansMilestone;
use App\DatabaseModels\Companies;
use App\Classes\MangoClass;
use App\Classes\MessagesClass;

class PaymentPlanController extends Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    private $mangopay;

    public function __construct(\MangoPay\MangoPayApi $mangopay) {

        $this->mangopay = $mangopay;

    }

    public function index($hash) {

        if (Auth::check()) {
            //set an example< plan
            $hash = "1551693284";
        }


        if(isset($_GET['protect']) && $_GET['protect'] == true){
            $protect = true;
            $login = true;
        }else{
            $login = false;
            $protect = false;
        }


        if(isset($_GET['login']) && $_GET['login'] == true){
            $loggedIn = true;
        }else{
            $loggedIn = false;
        }

        $blade["locale"] = App::getLocale();

        //get all plan details for the normal payment plan view
        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        $query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->where('projects_plans.hash', '=', $hash);
        $query->select('projects.name AS projectName', 'clients.firstname', 'clients.lastname', 'clients.mail', 'clients.firstname', 'clients.address1', 'clients.city', 'clients.address2', 'projects_plans.*');
        $plan = $query->first();

        $company = Companies::where("id", "=", $plan->service_provider_fk)
            ->first();

        $user = App\DatabaseModels\Users::where("id", "=", $company->users_fk)
            ->first();

        $docs = PlanDocs::where("plan_id_fk", "=", $plan->id)
            ->get();

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();

        //only if client comes back from mangopay
        if (isset($_GET['transactionId'])) {

            //if client comes from mangopay they will habe an transaction id
            $transactionId = $_GET['transactionId'];

            //get result of the payin made by client
            $mango_obj = new MangoClass($this->mangopay);
            $payinResult = $mango_obj->getPayInCardWeb($transactionId);

            //update the result of the payin in intern DB
            $payIn = App\DatabaseModels\MangoPayin::where("mango_id", "=", $transactionId)
                ->first();

            $payIn->state = $payinResult->Status;
            $payIn->result_code = $payinResult->ResultCode;
            $payIn->result_message = $payinResult->ResultMessage;
            $payIn->save();

            //if payment was successful update the paystatus of our intern DB
            if ($payinResult->Status == "SUCCEEDED") {
                $milestone->paystatus = 1;
                $milestone->save();

                $msg_obj = new MessagesClass();
                $result = $msg_obj->payInSucceeded($milestone, $plan, $user);

            }
        }

        return view('frontend.clients.payment-plan', compact('blade', 'plan', 'user', 'company', 'milestone', 'docs', 'login', 'hash', 'protect', 'loggedIn'));


    }

    public function loadPreview($id) {

        $blade["locale"] = App::getLocale();


        $plan = Plans::where("id", "=", $id)
            ->first();

        return Redirect::to($blade["locale"]."/payment-plan/preview/".$plan->hash)->withInput()->with('success', 'Your payment plan has been created!');

    }

    public function preview($hash) {

        $blade["locale"] = App::getLocale();

        $user = Auth::user();
        $preview = true;

        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        $query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->where('projects_plans.hash', '=', $hash );
        $query->select('projects.name', 'clients.firstname', 'clients.lastname', 'clients.mail', 'clients.firstname', 'clients.address1', 'clients.city', 'clients.address2', 'projects_plans.*');
        $plan = $query->first();

        $company = Companies::where("id", "=", $user->service_provider_fk)
            ->first();

        if(!isset($plan)){
            $plan = Plans::where("hash", "=", $hash)
                ->first();
        }

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();

        return view('frontend.clients.payment-plan', compact('blade', 'plan', 'user', 'company', 'milestone', 'preview'));
    }

    public function payCC($hash) {

        $blade["locale"] = App::getLocale();
      

        $plan = Plans::where("hash", "=", $hash)
            ->first();

        $company = Companies::where("id", "=", $plan->service_provider_fk)
            ->first();

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();

        $client = Clients::where("id", "=", $plan->clients_id_fk)
            ->first();

        $mango_obj = new MangoClass($this->mangopay);
        $url=   $mango_obj->createTransaction($company, $client, $milestone, $hash);

        return Redirect::to($url->RedirectURL);


    }

    public function payBank($hash) {

        $blade["locale"] = App::getLocale();


        $plan = Plans::where("hash", "=", $hash)
            ->first();

        $company = Companies::where("id", "=", $plan->service_provider_fk)
            ->first();

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();

        $client = Clients::where("id", "=", $plan->clients_id_fk)
            ->first();



        return view('frontend.clients.bank-transfer', compact('blade', 'plan', 'user', 'company', 'milestone'));


    }

    public function releaseMilestone($hash) {


        $user = Auth::user();

        $query = DB::table('companies');
        $query->join('companies_bank', 'companies_bank.service_provider_fk', '=', 'companies.id');
        $query->where('companies.id', '=', $user->service_provider_fk );
        $query->select('companies.id', 'companies.mango_id', 'companies_bank.*');
        $company_details = $query->first();


        $mango_obj = new MangoClass($this->mangopay);
        $payinResult =   $mango_obj->createBankAccount($company_details);

    }


    public function setProtection() {

        $ll = App::getLocale();
        $users = new UsersPaymentPlan;
        $users->plan_hash = $_GET["hash"];
        $users->email = $_GET["email"];
        $users->password =  $_GET["password"];
        $users->active = "0";
        $users->role = 4;
        $users->save();

        $plan = Plans::where("hash", "=", $_GET["hash"])
            ->first();

        //set hide to hide the modal which ask for setting up a protection
        $plan->protection = "hide";
        $plan->protection_user = $users->id;
        $plan->save();


        $subject= "Trustfy Payments - Plan Protection";
        $data['content'] = "Your Plan Protection: <br>".$plan->email."<br> Passwort:".$_GET["password"];

        $msg_obj = new MessagesClass();
        $msg_obj->sendStandardMail($subject, $data, $_GET["email"]);

        $result = self::login();

        if($result){
            return response()->json(['success' => true, 'msg' => 'Logged In']);
        }else{
            return response()->json(['success' => false, 'msg' => 'Unknown Login Data']);
        }

    }

    public function loginPlan() {

       $result = self::login();

        if($result){
            return response()->json(['success' => true, 'msg' => 'Logged In']);
        }else{
            return response()->json(['success' => false, 'msg' => 'Unknown Login Data']);
        }

    }



    public function login() {

        $data = Input::all();

        $user = UsersPaymentPlan::where("plan_hash", "=", $data["hash"])
            ->first();


        if(isset($data["password-login"])){
            if($user->email == $data["email-login"] && $user->password == $data["password-login"]){
                return true;
            }else{
                return false;
            }
        }else{
            if($user->email == $data["email"] && $user->password == $data["password"]){
                return true;
            }else{
                return false;
            }
        }


    }



}