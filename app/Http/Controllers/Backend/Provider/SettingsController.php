<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.08.2018
 * Time: 16:15
 */

namespace App\Http\Controllers\Backend\Provider;

// Libraries
use App;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function index() {


        $blade["locale"] = App::getLocale();

        return view('backend.settings.index', compact('blade'));

    }

}