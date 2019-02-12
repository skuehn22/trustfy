<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:08
 */

namespace App\Http\Controllers\Frontend;

// Libraries
use App, Redirect, Auth, DB;

use App\Http\Controllers\Controller;

use App\DatabaseModels\Projects;
use App\DatabaseModels\PlansTypes;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\Classes\StateClass;
use App\DatabaseModels\PlanDocs;
use App\DatabaseModels\PlansMilestone;
use App\DatabaseModels\Companies;
use App\Classes\MangoClass;

class PaymentPlanController extends Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    private $mangopay;

    public function __construct(\MangoPay\MangoPayApi $mangopay) {

        $this->mangopay = $mangopay;

    }

    public function index($hash) {

        $blade["locale"] = App::getLocale();

        $user = Auth::user();

        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        $query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->where('projects_plans.hash', '=', $hash );
        $query->select('projects.name', 'clients.firstname', 'clients.lastname', 'clients.mail', 'clients.firstname', 'clients.address1', 'clients.city', 'clients.address2', 'projects_plans.*');
        $plan = $query->first();

        $company = Companies::where("id", "=", $user->service_provider_fk)
            ->first();

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();


        return view('frontend.clients.payment-plan', compact('blade', 'plan', 'user', 'company', 'milestone'));
    }

    public function loadPreview($id) {

        $blade["locale"] = App::getLocale();


        $plan = Plans::where("id", "=", $id)
            ->first();

        return Redirect::to($blade["locale"]."/payment-plan/preview/".$plan->hash)->withInput()->with('success', 'Your payment plan has been created!');

    }

    public function preview($hash) {

        $blade["locale"] = App::getLocale();

        $user = Auth::user();

        $query = DB::table('projects_plans');
        $query->join('clients', 'projects_plans.clients_id_fk', '=', 'clients.id');
        $query->join('projects', 'projects_plans.projects_id_fk', '=', 'projects.id');
        $query->where('projects_plans.hash', '=', $hash );
        $query->select('projects.name', 'clients.firstname', 'clients.lastname', 'clients.mail', 'clients.firstname', 'clients.address1', 'clients.city', 'clients.address2', 'projects_plans.*');
        $plan = $query->first();

        $company = Companies::where("id", "=", $user->service_provider_fk)
            ->first();

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();


        return view('frontend.clients.payment-plan', compact('blade', 'plan', 'user', 'company', 'milestone'));
    }

    public function payCC($hash) {

        $blade["locale"] = App::getLocale();
        $user = Auth::user();

        $plan = Plans::where("hash", "=", $hash)
            ->first();

        $company = Companies::where("id", "=", $user->service_provider_fk)
            ->first();

        $milestone = PlansMilestone::where("projects_plans_id_fk", "=", $plan->id)
            ->first();

        $client = Clients::where("id", "=", $plan->clients_id_fk)
            ->first();

        $mango_obj = new MangoClass($this->mangopay);
        $url=   $mango_obj->createTransaction($company, $client, $milestone->amount, $hash);

        return Redirect::to($url->RedirectURL);


    }

}