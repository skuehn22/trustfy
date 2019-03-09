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
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\DatabaseModels\Users;
use App\Classes\StateClass;
use App\Classes\PlansDetailsClass;

class DashboardController extends Controller
{

    public function index() {

        if (Auth::check()) {

            $blade["user"] = Auth::user();

            if(isset($_GET['tour']) && $_GET['tour']=="activate" ){

                $user = Users::where("id", "=", $blade["user"]->id)
                    ->first();

                $user->tour = "true";
                $user->save();
                $blade["user"] = Auth::user();

            }

            $blade["ll"] = App::getLocale();

            $setup = $blade["user"]->setup;


            $plans = Plans::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("hidden", "=", "0")
                ->where("delete", "=", "0")
                ->get();

            $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->lists('lastname', 'id');


            $plansList= Plans::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->where("hidden", "=", "0")
                ->lists('name', 'id');

         /*
            $last_plan = Plans::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->where("last_viewed", "=", "1")
                ->first();
        */

            $messages = MessagesCompanies::where("company_id_fk", "=", $blade["user"]->service_provider_fk)
                ->where("delete", "=", "0")
                ->paginate(4);


            foreach($messages as $message){

                if($message->projects_id_fk != 0){

                    $tmp_project = Projects::where("id", "=", $message->projects_id_fk)
                        ->first();

                    $messages->projectName = $tmp_project->name;

                }

            }


            $planObj = new PlansDetailsClass();
            $funds = $planObj->getFundsDetails($blade["user"]->service_provider_fk);


            if($funds['total']>0){
                $percent['funded'] = $funds['funded'] * 100 / $funds['total'];
                $percent['pending'] = $funds['pending'] * 100 / $funds['total'];
                $percent['released'] = $funds['released'] * 100 / $funds['total'];
            }else{
                $percent['funded'] = 0;
                $percent['pending'] = 0;
                $percent['released'] = 0;
            }



            if($percent['funded'] == 0) {

                $openRight['funded'] =  0;
                $openLeft['funded'] =  0;

            }else{


                if( $percent['funded'] >50){
                    $openRight['funded'] =  180;
                    $openLeft['funded'] =  $percent['funded'] *360 / 100;
                }else{

                    $openRight['funded'] = $percent['funded'] *360 / 100;
                    $openLeft['funded'] =  0;

                }

            }

            if($percent['pending'] == 0) {

                $openRight['pending'] =  0;
                $openLeft['pending'] =  0;

            }else{

                if($percent['pending']>50){
                    $openRight['pending'] =  180;
                    $openLeft['pending'] =  $percent['pending'] *360 / 100;
                }else{
                    $openRight['pending'] = $percent['pending'] *360 / 100;
                    $openLeft['pending'] =  0;
                }


            }


            if($percent['released'] == 0) {

                $openRight['released'] =  0;
                $openLeft['released'] =  0;

            }else{

                if($percent['released']>50){
                    $openRight['released'] =  180;
                    $openLeft['released'] =  $percent['released'] *360 / 100;
                }else{
                    $openRight['released'] = $percent['released'] *360 / 100;
                    $openLeft['released'] =  0;
                }

            }



            $upcoming = $planObj->upcomingPayment($blade["user"]->service_provider_fk);


            $planUrl = env("APP_URL") . "/" . App::getLocale() . "/payment-plan/release-milestone/abc";
            return view('backend.freelancer.dashboard', compact('planUrl', 'blade', 'setup', 'openRight', 'openLeft','last_plan', 'plans', 'plansList', 'messages', 'funds', 'upcoming', 'clients'));

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

        $typ = $msg->typ;

        return response()->json(['success' => 'Msg successfully created', 'data' => $msg, 'typ' => $typ]);
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


    public function tourDone()
    {

        if (Auth::check()) {

            $blade["ll"] = App::getLocale();
            $blade["user"] = Auth::user();

            $user = Users::where("id", "=", $blade["user"]->id)
                ->first();

            $user->tour = "false";
            $user->save();

            return $user;

        }
    }




}