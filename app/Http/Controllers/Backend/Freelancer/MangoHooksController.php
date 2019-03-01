<?php


namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth;

use App\Http\Controllers\Controller;
use App\DatabaseModels\MangoHooks;

class MangoHooksController extends Controller
{

    public function receive()
    {
        $hook = new MangoHooks();
        $hook->type = $_GET['EventType'];
        $hook->ressourceId = $_GET['RessourceId'];
        $hook->save();
    }

}