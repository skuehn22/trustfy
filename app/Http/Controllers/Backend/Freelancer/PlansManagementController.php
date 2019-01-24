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

        $query = DB::table('order_item_program');

        $query->join('programs', 'order_item_program.program_id_fk', '=', 'programs.id')
            ->where("order_item_program.program_price_fk", "!=", 0)
            ->where("order_item_program.statusart", "=", 2);

        $plans = Plans::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->where("clients_id_fk", "!=", "0")
            ->get();

        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        //$query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->groupBy('projects_plans.updated_at');
        $plans = $query->get();

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

        if(isset($input['projects']))
            $plan->projects_id_fk = $input['projects'];

        $plan->hidden = 0;
        $plan->save();

        return Redirect::to($blade["ll"]."/freelancer/plans/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

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

}