<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Redirect, Form, DB;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Projects;
use App\DatabaseModels\ProjectsAddress;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;

class PlansManagementController extends Controller
{

    public function index() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        $query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->groupBy('projects_plans.updated_at');
        $plans = $query->get();

        foreach($plans as $plan) {
            $response = self::getStatus($plan->state);
            $plan->color =  $response['color'];
            $plan->state =  $response['state'];
        }



        return view('backend.freelancer.plans.overview', compact('blade', 'plans'));

    }

    public function create() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        $plan = new Plans();
        $plan->service_provider_fk = $blade["user"]->service_provider_fk;
        $plan->hidden = 1;
        $plan->save();

        return view('backend.freelancer.plans.new', compact('blade', 'clients', 'plan'));

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


        return view('backend.freelancer.plans.edit', compact('blade', 'clients', 'plan'));

    }

    public function save($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $plan = Plans::where("id", "=", $id)
            ->first();

        if(isset($input['clients']))
            $plan->clients_id_fk = $input['clients'];

        if(isset($input['projects']))
            $plan->projects_id_fk = $input['projects'];

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

        $project = Projects::where("id", "=", $id)
            ->first();

        $project->delete = 1;
        $project->save();

        return Redirect::to($blade["ll"]."/freelancer/plan/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

    }

    public function getPlanByTyp(){

        $input = Request::all();

        if(isset($input['typ']) && $input['typ'] == 1){
            return view('backend.freelancer.plans.payment-single', compact('blade', 'clients', 'plan'));
        }else{
            return view('backend.freelancer.plans.payment-milestones', compact('blade', 'clients', 'plan'));
        }

    }

    public function getStatus($id){

        switch ($id) {
            case 0:
                $state['color'] = "text-success";
                $state['state'] = "active";
                break;
            case 1:
                $state['color'] = "text-warning";
                $state['state'] = "not send";
                break;
            default:
                $state['color'] = "text-secondary";
                $state['state'] = "open";
        }

        return $state;

    }


}