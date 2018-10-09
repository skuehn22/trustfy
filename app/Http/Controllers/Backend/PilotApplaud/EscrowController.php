<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 08.10.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\PilotApplaud;

// Libraries
use App, Auth;

use App\Http\Controllers\Controller;

class EscrowController extends Controller
{

    public function index() {


        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        //return view('backend.pilot_applaud.dashboard', compact('blade'));

    }

}