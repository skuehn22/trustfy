<?php

namespace App\Http\Controllers;
// Libraries
use App;
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
    public function index()
    {
        $agent = new Agent();
        $blade["locale"] = App::getLocale();

        if(!$agent->is('Windows')){
            return view('frontend.special_windows.home');
        }else{
            return view('backend.provider.dashboard', compact('blade'));
        }
    }
}
