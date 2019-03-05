<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 27.02.2019
 * Time: 11:00
 */

namespace App\Classes;

use App, Auth, Request, Redirect, Form, DB, MangoPay, Mail, Hash;
use App\Http\Controllers\Controller;
use App\DatabaseModels\MessagesCompanies;
use App\DatabaseModels\Companies;
use App\DatabaseModels\ClientsMangowallets;
use App\DatabaseModels\Clients;


class PlansDetailsClass  extends Controller
{

    //global sender function
    public function getFundsDetails($user){

    $query = DB::table('projects_plans_milestones');
    $query->join('projects_plans', 'projects_plans_milestones.projects_plans_id_fk', '=', 'projects_plans.id');
    $query->where('projects_plans.service_provider_fk', '=', $user);
    $query->where('projects_plans_milestones.delete', '=', '0');
    $query->where('projects_plans.delete', '=', '0');
    $query->select('projects_plans_milestones.*');
    $funds = $query->get();

    $fundsCalculation['pending'] = 0;
    $fundsCalculation['funded'] = 0;
    $fundsCalculation['released'] = 0;
    $fundsCalculation['total'] = 0;

    foreach ($funds as $fund){

        switch ($fund->paystatus) {

            case "0":
                $fundsCalculation['pending'] = $fundsCalculation['pending'] + $fund->amount;
                break;

            case "1":
                $fundsCalculation['funded'] = $fundsCalculation['funded'] + $fund->amount;
                break;

            case "2":
                $fundsCalculation['released'] = $fundsCalculation['released'] + $fund->amount;
                break;

            default:
                $fundsCalculation['unknown'] = 0;
        }

        $fundsCalculation['total'] = $fundsCalculation['total'] + $fund->amount;

    }

      return $fundsCalculation;

    }


}