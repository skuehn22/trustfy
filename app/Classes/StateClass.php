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
                $state['color'] = "#006600";
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
                $state['state'] = "Saved";
                break;
            case 1:
                $state['color'] = "text-warning";
                $state['state'] = "Sent";
                break;
            case 2:
                $state['color'] = "text-success";
                $state['state'] = "Funded";
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
                $state['state'] = "open";
                $state['info'] = "Please pay the money when the milestone is due..";
                break;
            case 1:
                $state['color'] = "#d39c06";
                $state['state'] = "sent";
                $state['info'] = "Waiting for the freelancer to finish the work.";
                break;
            case 2:
                $state['color'] = "#006600";
                $state['state'] = "funded";
                $state['info'] = 'Once work is complete, click "release" to pay your freelancer.';
                break;
            case 3:
                $state['color'] = "blue";
                $state['state'] = "payout created";
                $state['info'] = "Waiting for the freelancer to finish the work.";
                break;
            case 4:
                $state['color'] = "#006600";
                $state['state'] = "payout succeded";
                $state['info'] = "Waiting for the freelancer to finish the work.";
                break;
            case 5:
                $state['color'] = "#d39c06";
                $state['state'] = "pending";
                $state['info'] = "Waiting for the arrival of the money.";
                break;
            case 6:
                $state['color'] = "#d39c06";
                $state['state'] = "pending";
                $state['info'] = "Please see your E-mails: Transfer the amount into escrow and mark transaction as complete.";
                break;
            case 7:
                $state['color'] = "#006600";
                $state['state'] = "work completed";
                $state['info'] = "Waiting for the freelancer to finish the work.";
                break;
            case 8:
                $state['color'] = "#006600";
                $state['state'] = "money released";
                $state['info'] = "Waiting for the freelancer to finish the work.";
                break;
            default:
                $state['color'] = "text-secondary";
                $state['state'] = "open";
                $state['info'] = "";
        }

        return $state;

    }

}