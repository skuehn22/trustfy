<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Redirect, Form;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Projects;
use App\DatabaseModels\ProjectsAddress;
use App\DatabaseModels\Clients;

class ProjectPlanManagementController extends Controller
{

    public function index() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();


        $projects = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();



        return view('backend.freelancer.projects.plan', compact('blade', 'projects'));

    }

    public function create() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        return view('backend.freelancer.plan-new', compact('blade', 'clients'));

    }


    public function edit($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        $project = Projects::where("id", "=", $id)
            ->where("delete", "=", "0")
            ->first();

        $projectaddress  = ProjectsAddress::where("project_id_fk", "=", $id)
            ->where("delete", "=", "0")
            ->first();

        return view('backend.freelancer.plan-edit', compact('blade', 'clients', 'project', 'projectaddress'));

    }

    public function save($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        if($id == 0){
            $project = new Projects();
            $projectaddress = new ProjectsAddress();
        }else{
            $project = Projects::where("id", "=", $id)
                ->first();

            $projectaddress = ProjectsAddress::where("project_id_fk", "=", $id)
                ->first();
        }

        $project->name = $input["name"];
        $project->desc = $input["description"];
        $project->client_id_fk = $input["clients"];
        $project->service_provider_fk = $blade["user"]->service_provider_fk;
        $project->save();

        if(!empty($input["street"])){
            $projectaddress->street = $input["street"];
            $projectaddress->city = $input["city"];
            $projectaddress->country = $input["country"];
            $projectaddress->project_id_fk = $project->id;
            $projectaddress->save();
        }


        return Redirect::to($blade["ll"]."/freelancer/plan/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

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