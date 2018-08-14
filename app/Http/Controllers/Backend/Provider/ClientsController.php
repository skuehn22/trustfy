<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 14.08.2018
 * Time: 20:42
 */

namespace App\Http\Controllers\Backend\Provider;

// Libraries
use App;

use App\Http\Controllers\Controller;

class ClientsController extends Controller
{

    public function index() {

        $blade["locale"] = App::getLocale();

        return view('backend.clients.index', compact('blade'));

    }

}