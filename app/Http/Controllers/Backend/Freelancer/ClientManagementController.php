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

class ClientManagementController extends Controller
{

    public function index() {

        if (Auth::check()) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        return view('backend.freelancer.clients.overview', compact('blade', 'clients'));

        } else {

            return Redirect::to(env("MYHTTP"));
        }

    }



    public function getByUser() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $projects = Clients::where("id", "=", $input['id'])
            ->where("delete", "=", "0")
            ->get();

        return view('backend.freelancer.clients.dropdown', compact('blade', 'projects'));

    }

    public function getById() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $project = Clients::where("id", "=", $input['id'])
            ->where("delete", "=", "0")
            ->first();

        //$html = view('layouts.partials.cities')->with(compact('cities'))->render();
        return response()->json(['success' => true, 'data' => $project]);

    }


    public function create() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        return view('backend.freelancer.clients.clients-new', compact('blade', 'clients'));

    }


    public function edit($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $client = Clients::where("id", "=", $id)
            ->first();

        return view('backend.freelancer.clients.clients-edit', compact('blade', 'client'));

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


        $client->firstname = $input["client-firstname"];
        $client->lastname = $input["client-lastname"];
        $client->phone = $input["client-phone"];
        $client->mobile = $input["client-mobile"];
        $client->mail = $input["client-mail"];

        $client->currency = $input["currency"];
        $client->address1 = $input["client-address1"];
        $client->address2 = $input["client-address2"];
        $client->city = $input["client-city"];
        $client->country = $input["country"];

        $client->service_provider_fk = $blade["user"]->service_provider_fk;
        $client->save();

        return Redirect::to($blade["ll"]."/freelancer/clients/")->withInput()->with('success', 'The client has been created.');

    }

    public function delete($id) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $client = Clients::where("id", "=", $id)
            ->first();

        $client->delete = 1;
        $client->save();

        return Redirect::to($blade["ll"]."/freelancer/clients/")->withInput()->with('success', 'Vorgang erfolgreich abgeschlossen!');

    }


    public function getDropdownById() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        if(isset($_GET['width'])){
            $para['width'] = $_GET['width'];
            $para['name'] = $_GET['name'];
            $para['id'] = $_GET['id'];
        }


        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->where("delete", "=", "0")
            ->get();

        return view('backend.freelancer.setup.client-list', compact('blade', 'clients', 'para'));

    }

}