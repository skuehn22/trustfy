<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Redirect;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Clients;

class ProjectManagementController extends Controller
{

    public function index() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        return view('backend.freelancer.projects', compact('blade', 'clients'));

    }

    public function create() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        return view('backend.freelancer.projects-new', compact('blade', 'clients'));

    }


    public function edit($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $client = Clients::where("id", "=", $id)
            ->first();

        return view('backend.freelancer.projects-edit', compact('blade', 'client'));

    }

    public function save($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        if($id == 0){
            $client = new Clients();
        }else{
            $client = Clients::where("id", "=", $id)
                ->first();
        }

        $client->firstname = $input["firstname"];
        $client->lastname = $input["lastname"];
        $client->mail = $input["mail"];
        $client->address = $input["address"];
        $client->city = $input["city"];
        $client->country = $input["country"];
        $client->service_provider_fk = $blade["user"]->service_provider_fk;
        $client->save();

        return Redirect::to($blade["ll"]."/freelancer/projects/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

    }

    public function delete($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $client = Clients::where("id", "=", $id)
            ->first();

        $client->delete = 1;
        $client->save();

        return Redirect::to($blade["ll"]."/freelancer/projects/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

    }

}