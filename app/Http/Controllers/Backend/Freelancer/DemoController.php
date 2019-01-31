<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 31.01.2019
 * Time: 10:19
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Redirect, Form, DB;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Projects;
use App\DatabaseModels\Companies;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\DatabaseModels\Users;

class DemoController extends Controller
{

    public function index() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        if (Auth::check()) {

            $company = self::loadCompany($blade["user"]);
            $clients = self::loadClients($blade["user"], $company);
            $projects   = self::loadProjects($blade["user"], $clients, $company);
            $plans   = self::loadPlans();


        } else {
            return Redirect::to(env("MYHTTP"));
        }

        return $input;

    }

    public function loadCompany($user) {

        $blade["user"] = Auth::user();
        $demo = Companies::where("demo", "=", "1")
            ->first();

        $company = $demo->replicate();
        $company->users_fk = $user->id;
        $company->demo = 0;
        $company->save();

        //update user with created company id
        $user = Users::find($blade["user"]->id);
        $user->service_provider_fk = $company->id;
        $user->save();

        return $company;

    }


    public function loadClients($user, $company) {

        $demos = Clients::where("demo", "=", "1")
            ->get();

        foreach ($demos as $demo) {

            $client = $demo->replicate();
            $client->service_provider_fk = $company->id;
            $client->demo = 0;
            $client->save();

        }

    }

    public function loadProjects($company) {

        $user = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $user->service_provider_fk)
            ->get();

        $i=0;

        foreach ($clients as $client) {

            $projects_client[$i] = $client;
            $i = $i+1;
        }

        $i=0;

        $demos = Projects::where("demo", "=", "1")
            ->get();

        foreach ($demos as $demo) {

            $project = $demo->replicate();
            $project->service_provider_fk = $user->service_provider_fk;
            $project->client_id_fk = $projects_client[$i]->id;
            $project->demo = 0;
            $project->save();
            $i = $i+1;
        }
    }

    public function loadPlans() {

        $user = Auth::user();

        $projects = Projects::where("service_provider_fk", "=", $user->service_provider_fk)
            ->get();

        $demos = Plans::where("demo", "=", "1")
            ->get();

        $i=0;

        foreach ($projects as $project) {

            $projects_tmp[$i] = $project;
            $i = $i+1;
        }

        $i=0;

        foreach ($demos as $demo) {

            $plan = $demo->replicate();
            $plan->service_provider_fk =$projects_tmp[$i]->service_provider_fk;
            $plan->clients_id_fk = $projects_tmp[$i]->client_id_fk;
            $plan->projects_id_fk = $projects_tmp[$i]->id;
            $plan->demo = 0;
            $plan->save();
            $i = $i+1;

        }



    }

}