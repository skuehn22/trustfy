<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.02.2019
 * Time: 16:55
 */

namespace App\Classes;


class StateClass
{

    public function projects($id) {

        switch ($id) {
            case 0:
                $state['color'] = "text-success";
                $state['state'] = "active";
                break;
            case 1:
                $state['color'] = "text-warning";
                $state['state'] = "paused";
                break;
            case 2:
                $state['color'] = "text-secondary";
                $state['state'] = "canceled";
                break;
            case 3:
                $state['color'] = "green";
                $state['state'] = "finished";
                break;
            default:
                $state['color'] = "text-secondary";
                $state['state'] = "open";
        }

        return $state;

    }

    public function plans($id){

        switch ($id) {
            case 0:
                $state['color'] = "text-success";
                $state['state'] = "active";
                break;
            case 1:
                $state['color'] = "text-warning";
                $state['state'] = "not send";
                break;
            default:
                $state['color'] = "text-secondary";
                $state['state'] = "open";
        }

        return $state;

    }
}