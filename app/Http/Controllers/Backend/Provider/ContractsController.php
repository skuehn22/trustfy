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

use App\Http\Controllers\Controller;

class ContractsController extends Controller
{

    public function getTypes() {

        return view('backend.documents.types', compact('test'));

    }

    public function createProposal() {

        return view('backend.documents.proposal.create-proposal', compact('test'));

    }

    public function createProposalBlank() {


        return view('backend.documents.proposal.contractors-proposal', compact('test'));

    }

}