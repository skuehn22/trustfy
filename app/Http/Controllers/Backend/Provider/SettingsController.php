<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.08.2018
 * Time: 16:15
 */

namespace App\Http\Controllers\Backend\Provider;


// Libraries
use App, Request, Auth;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Provider;

class SettingsController extends Controller
{

    public function index() {

        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        $provider = $this->getCompany($blade["user"]);

        return view('backend.settings.index', compact('blade', 'provider'));

    }

    public function getCompany($user) {

        $blade["user"] = Auth::user();
        $provider = Provider::find($user->id);

        return $provider;

    }

    public function saveCompany() {

        $input = Request::all();
        $blade["locale"] = App::getLocale();

        $provider = new Provider();
        $provider->name = $input["company"];
        $provider->save();


        return view('backend.settings.index', compact('blade'));

    }

}