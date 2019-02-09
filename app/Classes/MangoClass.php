<?php
namespace App\Classes;

use App, Auth, DB, Hash;
use MangoPay, Redirect, Request;
use App\Http\Controllers\Controller;
use App\DatabaseModels\CompaniesMangowallets;
use App\DatabaseModels\ClientsMangowallets;


class MangoClass extends Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */

    private $mangopay;

    public function __construct(\MangoPay\MangoPayApi $mangopay) {

        $this->mangopay = $mangopay;

    }

    public function index() {

        if(isset($_GET['transactionId'])){
            return Redirect::to("/mangopay/sandbox")->withInput()->with('success', 'PayIn ('.$_GET['transactionId'].') erfolgreich durchgeführt');
        }else{
            $users = $this->getAllUser();
            $wallets = $this->getWalletInfo();

            return view('backend.mangopay.sandbox_index', compact('blade', 'users', 'wallets'));
        }

    }

    public function createTransaction($company, $client, $amount)
    {

        $input = Request::all();

        $blade["locale"] = App::getLocale();
        $user = Auth::user();

        //check if already an performer with this email exists
        if ($company->mango_id != 0) {
            $mango_freelancer = $this->getUser($company);
        } else {
            $mango_freelancer = $this->createLegalUser($company, $user);

            DB::table('company')
                ->where('email', $user->email)
                ->update(['mango_id' => $mango_freelancer->Id]);
        }

        //check if already an client with this email exists
        if ($client->mango_id != 0) {
            $mango_client = $this->getUser($client);
        } else {
            $mango_client = $this->createNaturalUser($client);

            DB::table('clients')
                ->where('id', $client->id)
                ->update(['mango_id' => $mango_client->Id]);
        }

        //get wallet for performer and client
        $freelancer_wallet_id = $this->getMangoWallets($mango_freelancer->Id);
        $client_wallet_id = $this->getMangoWallets($mango_client->Id);

        //if there is no wallet create one
        if (!$freelancer_wallet_id) {
            $freelancer_wallet = $this->createWallet($mango_freelancer->Id);
            $performer_wallet_id = $freelancer_wallet->Id;
            $wallet = new CompaniesMangowallets();
            $wallet->id = $freelancer_wallet->Id;
            $wallet->performer_id_fk = $company->id;
            $wallet->save();
        }

        //if there is no wallet create one
        if (!$client_wallet_id) {
            $client_wallet = $this->createWallet($mango_client->Id);
            $client_wallet_id = $client_wallet->Id;
            $wallet = new ClientsMangowallets();
            $wallet->id = $client_wallet->Id;
            $wallet->client_id_fk = $client->id;
            $wallet->save();
        }

        $hash = $this->prepPayInCardWeb($mango_client->Id, $freelancer_wallet_id, $amount);
        $url = $this->openTransaction($hash);
        return $url;

    }

    public function createUser($company, $user) {
        try {

            // create user for payment
            $mangouser = new MangoPay\UserNatural();
            $mangouser->FirstName = $company->firstname;
            $mangouser->LastName = $company->lastname;
            $mangouser->Email = $user->email;
            $mangouser->Birthday = time();
            $mangouser->Nationality = 'IRL';
            $mangouser->CountryOfResidence = 'IRL';
            $mangouser->Occupation = "Freelancer";
            $mangouser->IncomeRange = 3;
            $createdUser = $this->mangopay->Users->Create($user);

                return $createdUser;



        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }



    }

    public function createLegalUser($company, $user) {
        try {

            // create user for payment
            $mangouser = new MangoPay\UserLegal();

            $mangouser->LegalPersonType = \MangoPay\LegalPersonType::Business;
            $mangouser->Name = $company->name;
            $mangouser->Email = $user->email;
            $mangouser->LegalRepresentativeFirstName =  $company->firstname;
            $mangouser->LegalRepresentativeLastName =  $company->lastname;
            $mangouser->LegalRepresentativeBirthday = time();
            $mangouser->LegalRepresentativeNationality = "IE";
            $mangouser->LegalRepresentativeCountryOfResidence = "IE";
            $createdUser = $this->mangopay->Users->Create($mangouser);

            return $createdUser;


        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

    }

    public function getAllUser() {
        try {

            //$pagination = new MangoPay\Pagination(1, 8);
            $users =$this->mangopay->Users->GetAll();

            return $users;

        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

    }

    public function getWalletsIn() {
        try {

            $wallets =$this->mangopay->Users->GetWallets($_GET['id']);
            return view('backend.mangopay.sandbox_get_wallets', compact('wallets'));


        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

    }

    public function getWalletsOut() {
        try {

            $wallets =$this->mangopay->Users->GetWallets($_GET['id']);
            return view('backend.mangopay.sandbox_set_payout', compact('wallets'));


        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

    }

    public function createCard($createdUser){

        // register card
        $cardRegister = new \MangoPay\CardRegistration();
        $cardRegister->UserId = $createdUser->Id;
        $cardRegister->Currency = $_SESSION['currency'];
        $cardRegister->CardType = $_SESSION['cardType'];
        $createdCardRegister = $this->mangopay->CardRegistrations->Create($cardRegister);
        $_SESSION['cardRegisterId'] = $createdCardRegister->Id;


        //$cardRegister = $this->mangopay->CardRegistrations->Get($_SESSION['cardRegisterId']);
        //$cardRegister->RegistrationData = isset($_GET['data']) ? 'data=' . $_GET['data'] : 'errorCode=' . $_GET['errorCode'];
        //$updatedCardRegister = $this->mangopay->CardRegistrations->Update($cardRegister);
        //if ($updatedCardRegister->Status != \MangoPay\CardRegistrationStatus::Validated || !isset($updatedCardRegister->CardId))
        //    die('<div style="color:red;">Cannot create card. Payment has not been created.<div>');

        // get created virtual card object
        $card = $_SESSION['cardRegisterId'];

        return $card;
    }

    public function getWalletInfo(){

        $WalletId = 55576741;
        $Wallet = $this->mangopay->Wallets->Get($WalletId);

        return $Wallet;

    }

    public function getUser($performer) {
        try {

            $mangoPerformer = $this->mangopay->Users->Get($performer->mango_id);
            return $mangoPerformer;


        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }
    }

    public function createNaturalUser($client) {
        try {

            // create user for payment

            $user = new MangoPay\UserNatural();
            $user->Email = $client->mail;
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

    public function getMangoWallets($id) {
        try {

            $wallets =$this->mangopay->Users->GetWallets($id);

        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

        if(isset($wallets[0]->Id)){
            return $wallets[0]->Id;
        }else{
            return false;
        }
    }

    public function createWallet($user) {
        try {

            // create temporary wallet for user
            $wallet = new \MangoPay\Wallet();
            $wallet->Owners = array( $user );
            $wallet->Currency = 'EUR';
            $wallet->Description = "MVP Description";
            $createdWallet = $this->mangopay->Wallets->Create($wallet);

            return $createdWallet;

        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }
    }

    public function prepPayInCardWeb($author, $credited_wallet, $amount) {

        try {

            $hash =  base64_encode(Hash::make(time()));

            $payin = new App\DatabaseModels\MangoPayin();
            $payin->hash = $hash;
            $payin->author_id = $author;
            $payin->credited_wallet = $credited_wallet;
            $payin->amount = $amount + ($amount * 0.08);
            $payin->payment_type = "CARD";
            $payin->execution_type = "WEB";
            $payin->save();

        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

        return $hash;

    }

    public function openTransaction($hash){

        $input = Request::all();
        $blade["locale"] = App::getLocale();
        $blade["user"] = Auth::user();

        $payIn = $this->createPayInCardWeb($hash);

        //track user action
        //$tracking = new ApplaudTracking();
        //$tracking->action=1;
        //$tracking->save();

        return $payIn;

    }

    public function createPayInCardWeb($hash) {

        try {


            $prepedPayIn = App\DatabaseModels\MangoPayin::where("hash", "=", $hash)
                ->first();

            // create pay-in CARD DIRECT
            $payIn = new \MangoPay\PayIn();
            $payIn->CreditedWalletId = $prepedPayIn->credited_wallet;
            $payIn->AuthorId = $prepedPayIn->author_id;
            $payIn->PaymentType = "CARD";
            $payIn->PaymentDetails = new \MangoPay\PayInPaymentDetailsCard();
            $payIn->PaymentDetails->CardType = "CB_VISA_MASTERCARD";
            $payIn->DebitedFunds = new \MangoPay\Money();
            $payIn->DebitedFunds->Amount = $prepedPayIn->amount*100;
            $payIn->DebitedFunds->Currency ="EUR";
            $payIn->Fees = new \MangoPay\Money();
            $payIn->Fees->Amount = 300;
            $payIn->Fees->Currency = "EUR";
            $payIn->ExecutionType = "WEB";
            $payIn->ExecutionDetails = new \MangoPay\PayInExecutionDetailsWeb();
            $payIn->ExecutionDetails->ReturnURL = "http://mvp.dev-basti.de/en/applaud/payed/escrow";
            $payIn->ExecutionDetails->Culture = "EN";

            $result = $this->mangopay->PayIns->Create($payIn);

            $prepRedirect = $result->ExecutionDetails;

            return $prepRedirect;



        } catch (MangoPay\Libraries\ResponseException $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\ResponseException Code', $e->GetCode());
            MangoPay\Libraries\Logs::Debug('Message', $e->GetMessage());
            MangoPay\Libraries\Logs::Debug('Details', $e->GetErrorDetails());

        } catch (MangoPay\Libraries\Exception $e) {

            MangoPay\Libraries\Logs::Debug('MangoPay\Exception Message', $e->GetMessage());
        }

    }


}