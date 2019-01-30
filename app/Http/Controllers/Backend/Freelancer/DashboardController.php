<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 21.11.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth, Redirect;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index() {

        if (Auth::check()) {
            $blade["ll"] = App::getLocale();
            $blade["user"] = Auth::user();

            if (isset($_GET['setup'])) {
                $setup = $_GET['setup'];
            }

            $openRight = "180";
            $openLeft = "45";

            return view('backend.freelancer.dashboard', compact('blade', 'setup', 'openRight', 'openLeft'));
        } else {

            return Redirect::to(env("MYHTTP"));
        }

    }

}