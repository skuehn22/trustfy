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

        if(isset($company)){
            $team = Users::where("service_provider_fk", "=", $company->id)
                ->get();
        }

        return view('backend.freelancer.settings.index', compact('blade', 'company', 'user', 'team'));

    } else {

        return Redirect::to(env("MYHTTP"));
    }
}



    public function getCompany($user) {

        $blade["user"] = Auth::user();

        $provider = Companies::where("users_fk", "=", $user->id)
            ->where("delete", "=", "0")
            ->first();

        return $provider;

    }



    public function saveCompany() {

        $blade["user"] = Auth::user();
        $blade["ll"] = App::getLocale();

        $input = Request::all();
        $user = Users::find($blade["user"]->id);

        $company = Companies::where("id", "=", $blade["user"]->service_provider_fk)
        ->where("delete", "=", "0")
        ->first();

        if(!isset($company)){
            $company = new Companies();
        }

        $company->firstname = $input["firstname"];
        $company->lastname = $input["lastname"];
        $company->name = $input["company"];
        $company->city = $input["city"];
        $company->address = $input["address"];
        $company->country = $input["country"];
        $company->users_fk =  $blade["user"]->id;
        $company->save();

        $user = Users::find($blade["user"]->id);
        $user->service_provider_fk = $company->id;
        $user->save();

        return view('backend.freelancer.settings.index', compact('blade', 'company', 'user'));

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

        $data->service_provider_fk = -1;
        $data->save();

        return Redirect::to("$ll/freelancer/dashboard?setup=yes")->with('ll', $ll);

    }


    public function resetPw() {

        $ll = App::getLocale();
        $user = Auth::user();

        if(self::pwCheck($_POST)== false){
            return back()->withInput()->with('error', 'Passwords do not match.');
        }

        $response = Users::where("email", "=",  $_POST['email'])
            ->where("id", "!=",  $user->id)
            ->first();

        if(isset($response)){
            return back()->withInput()->with('error', 'E-Mail already taken.');

        }else{

            $data = Users::where("id", "=", $user->id)
                ->where("delete", "=",  "0")
                ->first();

            $data->email = $_POST['email'];
            $data->password =  bcrypt(  $_POST["password"]);
            $data->save();

            return back()->withInput()->with('success', 'Data changed successful.');

        }


        if($response == false){
            return back()->withInput()->with('error', 'E-Mail already taken.');

        }else{

            $response = self::login();
            return Redirect::to("$ll/freelancer/dashboard?setup=yes")->with('ll', $ll);
        }


    }


    public function pwCheck($data) {
        if($data['password'] != $data['password_confirmation']) {

            return false;

        }else{
            return true;
        }
    }


}