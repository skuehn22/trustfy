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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        if($blade["user"]->role == 0 ) {
            return Redirect::to($blade["locale"]."/provider/dashboard");
        }

        if($blade["user"]->role == 2 ) {
            return Redirect::to($blade["locale"]."/applaud/admin/dashboard");
        }


        if($blade["user"]->role == 3 ) {
            return Redirect::to($blade["locale"]."/applaud/performer/dashboard");
        }

        if($blade["user"]->role == 4 ) {
            return Redirect::to($blade["locale"]."/samples/onlinetradesmen/builder-dashboard");
        }


        //$agent = new Agent();

        /*
        if(!$agent->is('Windows')){
            return view('frontend.special_windows.home');
        }else{

        }
        */
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
        return Redirect::to($blade["locale"]."/login");

    }

}
