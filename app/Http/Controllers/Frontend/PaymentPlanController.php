<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:08
 */

namespace App\Http\Controllers\Frontend;

// Libraries
use App;

use App\Http\Controllers\Controller;

class PaymentPlanController extends Controller
{

    public function index() {

        $blade["locale"] = App::getLocale();
        return view('frontend.clients.payment-plan', compact('blade'));

    }

}