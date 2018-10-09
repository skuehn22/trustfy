<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 08.10.2018
 * Time: 16:42
 */

namespace App\Http\Controllers\Backend\PilotApplaud;

// Libraries
use App, Auth, DB;
use MangoPay, Redirect, Request;
use App\DatabaseModels\ApplaudPerformers;
use App\DatabaseModels\ApplaudClients;
use App\Http\Controllers\Controller;

class EscrowController extends Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    private $mangopay;

    public function __construct(\MangoPay\MangoPayApi $mangopay) {

        $this->mangopay = $mangopay;

    }

    public function index() {


        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        //return view('backend.pilot_applaud.dashboard', compact('blade'));

    }

    public function createTransaction() {

        $input = Request::all();

        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        $performer = $this->getPerformerInfo($input['performer']);
        $client = $this->getClientInfo($input['client']);

        //check if already an performer with this email exists
        if($performer->mango_id_fk !=0){
            $mango_performer = $this->getMangoUser($performer);
        }else{
            $mango_performer = $this->createMangoLegalUser($performer);

            DB::table('applaud_performers')
                ->where('email', $performer->email)
                ->update(['mango_id_fk' => $mango_performer->Id]);
        }

        //check if already an client with this email exists
        if($client->mango_id_fk !=0){
            $mango_client = $this->getMangoUser($client);
        }else{
            $mango_client = $this->createMangoNaturalUser($client);

            DB::table('applaud_clients')
                ->where('email', $client->email)
                ->update(['mango_id_fk' => $mango_client->Id]);
        }

        $test = "";

        //return view('backend.pilot_applaud.dashboard', compact('blade'));

    }



    public function createMangoLegalUser($performer) {
        try {

            // create user for payment
            $user = new MangoPay\UserLegal();

            $user->LegalPersonType = \MangoPay\LegalPersonType::Business;
            $user->Name = $performer->company;
            $user->Email = $performer->email;
            $user->LegalRepresentativeFirstName = $performer->firstname;
            $user->LegalRepresentativeLastName =$performer->lastname;
            $user->LegalRepresentativeBirthday = time();
            $user->LegalRepresentativeNationality = "FR";
            $user->LegalRepresentativeCountryOfResidence = "FR";
            $createdPerformer = $this->mangopay->Users->Create($user);

        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

        return $createdPerformer;
    }


    public function createMangoNaturalUser($client) {
        try {

            // create user for payment

            $user = new MangoPay\UserNatural();
            $user->Email = $client->email;
            $user->FirstName = $client->firstname;
            $user->LastName = $client->lastname;
            $user->Birthday = time();
            $user->Nationality = "FR";
            $user->CountryOfResidence = "FR";
            $result =  $this->mangopay->Users->Create($user);

        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

        return $result;
    }

    public function getMangoUser($performer) {
        try {

            $mangoPerformer = $this->mangopay->Users->Get($performer->mango_id_fk);
            return $mangoPerformer;


        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }
    }


    public function getPerformerInfo($email) {

        $user = ApplaudPerformers::where("email", "=", $email)
            ->first();

        return  $user;

    }

    public function getClientInfo($email) {

        $user = ApplaudClients::where("email", "=", $email)
            ->first();

        return  $user;

    }

}