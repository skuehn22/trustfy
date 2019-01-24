<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Request, Form;

use App\Http\Controllers\Controller;
use App\DatabaseModels\Companies;

class SetupController extends Controller
{

    public function index() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        return view('backend.freelancer.setup.welcome', compact('blade'));

    }

    public function company() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();
        $input = Request::all();

        $data = json_decode($input['company']);

        $company = new Companies();

        $company->firstname = $data->firstname;
        $company->lastname = $data->lastname;
        $company->name = $data->company;
        $company->city = $data->address;
        $company->address = $data->city;
        $company->country = $data->country;
        $company->users_fk = $blade["user"]->id;
        $company->save();

        return response()->json(['success' => true, 'data' => $company]);

    }


}