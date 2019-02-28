<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Redirect, DB;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Projects;
use App\DatabaseModels\MessagesCompanies;
use App\DatabaseModels\Users;
use App\DatabaseModels\Plans;
use App\Classes\StateClass;

class DashboardController extends Controller
{

    public function index() {

        if (Auth::check()) {

            $blade["ll"] = App::getLocale();
            $blade["user"] = Auth::user();
            $setup = $blade["user"]->setup;


            $projects = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->get();

            $projectList= Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->lists('name', 'id');

            $last_project = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->where("last_viewed", "=", "1")
                ->first();

            $plans = Plans::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->get();


            //get all plan details for the normal payment plan view
            $query = DB::table('messages_companies');
            $query->join('projects', 'messages_companies.projects_id_fk', '=', 'projects.id');
            $query->where('messages_companies.company_id_fk', '=',  $blade["user"]->service_provider_fk);
            $query->where('messages_companies.delete', '=', '0');
            $query->select('projects.name AS projectName', 'messages_companies.*');
            $messages = $query->get();


            $openRight = "180";
            $openLeft = "45";

            $planUrl = env("APP_URL") . "/" . App::getLocale() . "/payment-plan/release-milestone/abc";

            return view('backend.freelancer.dashboard', compact('planUrl', 'blade', 'setup', 'openRight', 'openLeft', 'projects','last_project', 'plans', 'projectList', 'messages'));

        } else {

            return Redirect::to(env("MYHTTP"));
        }

    }

    public function loadProject() {

        if (Auth::check()) {

            $blade["ll"] = App::getLocale();
            $blade["user"] = Auth::user();

            if($_GET['id']!="undefined"){

                $query = DB::table('projects');
                $query->join('clients', 'projects.client_id_fk', '=', 'clients.id');
                $query->where('projects.id', '=', $_GET["id"]);
                $query->select('projects.*', 'clients.firstname', 'clients.lastname');
                $project = $query->first();

                //set last viewed to load relevant project when the user returns
                //set past viewed project to 0
                $viewed = Projects::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                    ->where("last_viewed", "=", "1")
                    ->first();

                if(isset($viewed)){

                    $viewed->last_viewed = 0;
                    $viewed->save();

                    //set new viewed project to 1
                    $viewed = Projects::where("id", "=", $project->id)
                        ->first();

                    $viewed->last_viewed = 1;
                    $viewed->save();
                }


                $statusObj = new StateClass();
                $response =$statusObj->projects($project->state);

                $project->color =  $response['color'];
                $project->state =  $response['state'];

                $plans = Plans::where("projects_id_fk", "=", $project->id)
                    ->where("delete", "=", "0")
                    ->lists('name', 'id');
            }


            return view('backend.freelancer.dashboard.projects-details', compact('blade', 'setup', 'plans', 'project'));
        } else {

            return Redirect::to(env("MYHTTP"));
        }

    }


    public function loadMsgDetails()
    {


        $msg = MessagesCompanies::where("id", "=", $_GET['msg'])
            ->first();

        return response()->json(['success' => 'Msg successfully created', 'data' => $msg]);
    }



    public function loadPlan()
    {

        if (Auth::check()) {

            $blade["ll"] = App::getLocale();
            $blade["user"] = Auth::user();

            $plan = Plans::where("id", "=", $_GET['id'])
                ->first();

            if(isset($plan)){
                $statusObj = new StateClass();
                $response =$statusObj->plans($plan->state);

                $plan->color =  $response['color'];
                $plan->state =  $response['state'];
            }

            return view('backend.freelancer.dashboard.plan-details', compact('blade','plan'));

        }
    }

}