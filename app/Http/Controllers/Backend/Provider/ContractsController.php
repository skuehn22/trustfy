<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:08
 */

namespace App\Http\Controllers\Backend\Provider;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Provider;
use App\DatabaseModels\ContractsProposal;
use App\Http\Controllers\Controller;
use Auth, Form, Session;

class ContractsController extends Controller
{

    public function getTypes() {


        return view('backend.documents.types', compact('test'));

    }

    public function createProposal() {

        return view('backend.documents.proposal.create-proposal', compact('test'));

    }

    public function createProposalBlank() {

        $blade["user"] = Auth::user();

        $clients = Clients::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->get();

        $provider = Provider::where("id", "=", $blade["user"]->service_provider_fk)
            ->first();

        return view('backend.documents.proposal.contractors-proposal', compact('clients', 'provider'));

    }

    public function saveProposalBlank() {

        $session = Session::get('user_session');
        $blade["user"] = Auth::user();
        $proposal_get = json_decode($_GET["proposal"]);


        $proposal = new ContractsProposal();
        $proposal->service_provider_fk = $blade["user"]->service_provider_fk;
        $proposal->clients_fk = $proposal_get->client;
        $date = date('Y-m-d', strtotime($proposal_get->dateproposal));
        $proposal->date = $date;
        $proposal->session = $session;
        $proposal->expires = date('Y-m-d', strtotime($proposal_get->expiresdate));
        $proposal->save();

        return view('backend.documents.proposal.payment', compact('proposal'));

    }

    public function loadProposalTemplate() {

        $test="";

    }




}