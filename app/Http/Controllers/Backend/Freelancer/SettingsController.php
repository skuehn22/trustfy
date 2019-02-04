<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.08.2018
 * Time: 16:15
 */

namespace App\Http\Controllers\Backend\Freelancer;


// Libraries
use App, Request, Auth, Redirect, Hash;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Companies;
use App\DatabaseModels\Users;
use App\DatabaseModels\Projects;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;

class SettingsController extends Controller
{

    public function index() {

        if (Auth::check()) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $user = Users::find($blade["user"]->id);
        $company = $this->getCompany($blade["user"]);
        $team = Users::where("service_provider_fk", "=", $company->id)
            ->get();

        return view('backend.freelancer.settings.index', compact('blade', 'company', 'user', 'team'));

    } else {

        return Redirect::to(env("MYHTTP"));
    }
}



    public function getCompany($user) {

        $blade["user"] = Auth::user();

        $provider = Companies::where("id", "=", $user->service_provider_fk)
            ->first();

        return $provider;

    }



    public function saveCompany() {

        $blade["user"] = Auth::user();
        $blade["ll"] = App::getLocale();

        $input = Request::all();
        $user = Users::find($blade["user"]->id);

        $provider = Provider::find($blade["user"]->service_provider_fk);
        $provider->name = $input["company"];
        $provider->city = $input["city"];
        $provider->address = $input["address"];
        $provider->country = $input["country"];
        $provider->contact_users_fk = $input["contact"];
        $provider->save();

        $team = Users::where("service_provider_fk", "=", "1")
            ->get();

        return view('backend.settings.index', compact('blade', 'provider', 'user', 'team'));

    }

    public function saveAccount() {

        $blade["user"] = Auth::user();
        $input = Request::all();
        $blade["ll"] = App::getLocale();
        $provider = Provider::find($blade["user"]->service_provider_fk);

        $user = Users::find($blade["user"]->id);
        $user->firstname = $input["firstname"];
        $user->lastname = $input["lastname"];
        $user->email = $input["mail"];
        $user->phone = $input["phone"];

        $user->save();


        return view('backend.settings.index', compact('blade', 'user', 'provider'));

    }

    public function newTeamMember() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        return view('backend.settings.new-team-member', compact('blade'));

    }

    public function saveTeamMember() {

        $blade["user"] = Auth::user();
        $input = Request::all();
        $blade["ll"] = App::getLocale();
        $provider = Provider::find($blade["user"]->service_provider_fk);

        $password = Hash::make($input["password"]);

        $user = new Users();
        $user->service_provider_fk = $provider->id;
        $user->firstname = $input["firstname"];
        $user->lastname = $input["lastname"];
        $user->email = $input["mail"];
        $user->phone = $input["phone"];
        $user->active = "1";
        $user->role = "0";
        $user->password = $password;

        $user->save();

        return Redirect::to($blade["locale"]."/provider/settings/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

    }

    public function cancel() {

        $button = '<button type="button" class="btn btn-outline-dark load-content" id="new-team-member">New Team Member</button>';

        return $button;
    }

    public function reset(){

        $user = Auth::user();
        $ll = App::getLocale();

        //delete company
        $data = Companies::where("users_fk", "=", $user->id)
            ->where("delete", "=",  "0")
            ->first();

        $data->delete = 1;
        $data->save();

        //delete clients
        $data = Clients::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->get();

        foreach ($data as $client) {
            $client->delete = 1;
            $client->save();
        }

        //delete projects
        $data = Projects::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->get();

        foreach ($data as $project) {
            $project->delete = 1;
            $project->save();
        }

        //delete projects
        $data = Plans::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->get();

        foreach ($data as $plan) {
            $plan->delete = 1;
            $plan->save();
        }


        //delete company in users
        $data = Users::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->first();

        $data->service_provider_fk = 0;

        return Redirect::to("$ll/freelancer/dashboard?setup=yes")->with('ll', $ll);

    }





}