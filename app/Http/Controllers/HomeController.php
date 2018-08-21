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

        //Session::get('variableName');
        //$test = Session::all();
        $test = Session::all();
        if($blade["user"]->role == 0 ) {
            return Redirect::to($blade["locale"]."/provider/dashboard");
        }


        //$agent = new Agent();

        /*
        if(!$agent->is('Windows')){
            return view('frontend.special_windows.home');
        }else{

        }
        */


    }
}
