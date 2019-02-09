<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Redirect, Form, DB, MangoPay, Mail;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Projects;
use App\DatabaseModels\PlansTypes;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\Classes\StateClass;
use App\DatabaseModels\PlanDocs;

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

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        $types = PlansTypes::lists("name","id");

        $plan = new Plans();

        if($blade["user"]->service_provider_fk == 0){
            $plan->service_provider_fk = -1;
        }else{
            $plan->service_provider_fk = $blade["user"]->service_provider_fk;
        }

        $plan->hidden = 1;
        $plan->save();

        return view('backend.freelancer.plans.new', compact('blade', 'clients', 'plan', 'types'));

    }


    public function edit($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $plan = Plans::where("id", "=", $id)
            ->where("delete", "=", "0")
            ->first();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->lists("firstname","id");

        $projects = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->lists("name","id");

        $types = PlansTypes::lists("name","id");

        return view('backend.freelancer.plans.edit', compact('blade', 'clients', 'plan', 'projects', 'types'));

    }

    public function save($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $plan = Plans::where("id", "=", $id)
            ->first();

        if(isset($input['clients']))
            $plan->clients_id_fk = $input['clients'];

        if(isset($input['projects-dropdown']))
            $plan->projects_id_fk = $input['projects-dropdown'];

        if(isset($input['creation-date'])){
            $creation = date("Y-m-d", strtotime($input['creation-date']) );
            $plan->date = $creation;
        }

        if(isset($input['typ']))
            $plan->typ = $input['typ'];


        $plan->state = 1;
        $plan->hidden = 0;
        $plan->save();

        return Redirect::to($blade["ll"]."/freelancer/plans/edit/".$id)->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

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

        return Redirect::to($blade["ll"]."/freelancer/plans/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

    }

    public function getPlanByTyp(){

        $input = Request::all();

        if(isset($input['typ']) && $input['typ'] == 1){
            return view('backend.freelancer.plans.payment-single', compact('blade', 'clients', 'plan'));
        }else{
            return view('backend.freelancer.plans.payment-milestones', compact('blade', 'clients', 'plan'));
        }

    }


    public function send($id) {

        $blade["ll"] = App::getLocale();
        $user = Auth::user();
        $input = Request::all();

        $client = Clients::where("id", "=", $_GET['clients'])
            ->first();

        $company = App\DatabaseModels\Companies::where("id", "=", $user->service_provider_fk)
            ->first();


        $mango_obj = new MangoClass($this->mangopay);
        $url=   $mango_obj->createTransaction($company, $client, $input['single-amount']);

        Mail::send('emails.client_paylink', compact('data', 'client', 'company', 'user', 'url'), function ($message) use ($client) {
            $message->from('info@trustfy.io', 'Trustfy.io');
            $message->to($client->mail);
            $message->subject("Pay Me Nutte!");
            $message->bcc("kuehn.sebastian@gmail.com");
        });


        $this->saveAndClose($id);

        return Redirect::to($blade["ll"]."/freelancer/plans")->withInput()->with('success', 'The payment plan has been sent to your client.');

    }


    function getDocs(){

        $docs = PlanDocs::where('plan_id_fk', '=', $_GET['typ'] )
            ->get();

        return view('backend.freelancer.plans.docs', compact('blade', 'docs'));

    }



}