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
                $state['color'] = "text-secondary";
                $state['state'] = "saved";
                break;
            case 1:
                $state['color'] = "text-warning";
                $state['state'] = "sent";
                break;
            case 2:
                $state['color'] = "text-green";
                $state['state'] = "finished";
                break;
            default:
                $state['color'] = "text-secondary";
                $state['state'] = "saved";
        }

        return $state;

    }


    public function milestones($id){

        switch ($id) {
            case 0:
                $state['color'] = "grey";
                $state['state'] = "saved";
                break;
            case 1:
                $state['color'] = "yellow";
                $state['state'] = "send";
                break;
            case 2:
                $state['color'] = "green";
                $state['state'] = "funded";
                break;
            case 3:
                $state['color'] = "blue";
                $state['state'] = "payout created";
                break;
            case 4:
                $state['color'] = "green";
                $state['state'] = "payout succeded";
                break;
            default:
                $state['color'] = "text-secondary";
                $state['state'] = "open";
        }

        return $state;

    }

}