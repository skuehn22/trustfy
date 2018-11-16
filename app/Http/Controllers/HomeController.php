<?php

namespace App\Http\Controllers;
// Libraries
use App, Auth, Redirect, Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        return view('frontend.master-trustfy-homepage', compact('blade'));

    }

    public function marketplace() {
        $blade["locale"] = App::getLocale();
        return view('marketplace.index', compact('blade'));
    }

    public function marketplaceCats() {
        $blade["locale"] = App::getLocale();
        return view('marketplace.category', compact('blade'));
    }

    public function marketplaceDetail() {
        $blade["locale"] = App::getLocale();
        return view('marketplace.detail', compact('blade'));
    }

    public function logout(Request $request){

        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        Auth::logout();
        Session::flash('success',"logout");
        return Redirect::to($blade["locale"]."/");

    }

}
