<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.08.2018
 * Time: 16:15
 */

namespace App\Http\Controllers\Backend\Freelancer;


// Libraries
use App, Auth, Redirect, Hash, MangoPay, Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DatabaseModels\Companies;
use App\DatabaseModels\CompaniesType;
use App\DatabaseModels\Users;
use App\DatabaseModels\Projects;
use App\DatabaseModels\Clients;
use App\DatabaseModels\Plans;
use App\DatabaseModels\MangoKyc;
use App\Classes\MangoClass;

class SettingsController extends Controller
{

    /**
     * @var \MangoPay\MangoPayApi
     */
    private $mangopay;

    public function __construct(\MangoPay\MangoPayApi $mangopay) {

        $this->mangopay = $mangopay;

    }


    public function index() {

        if (Auth::check()) {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        $user = Users::find($blade["user"]->id);

        $company = $this->getCompany($blade["user"]);

        if(isset($company)){
            $team = Users::where("service_provider_fk", "=", $company->id)
                ->get();

            $bank = App\DatabaseModels\CompaniesBank::where("service_provider_fk", "=", $company->id)
                ->first();
        }

        //check if there were kyc actions in the past
        $kyc_doc_objs = MangoKyc::where("company_id_fk", "=",  $user->service_provider_fk)
            ->where("status", "!=",  "CREATED")
            ->get();


        //checks if there was a update done by mango pay
        if(count($kyc_doc_objs)>0){
            $mango_obj = new MangoClass($this->mangopay);
            $mango_obj->checkKycDocuments($company, $kyc_doc_objs);
        }

        //check if there were kyc actions in the past
        $kyc_doc_objs = MangoKyc::where("company_id_fk", "=",  $user->service_provider_fk)
            ->where("status", "!=",  "CREATED")
            ->get();


        $companyTypes= CompaniesType::where("delete", "=", "0")
                ->lists('title', 'id');

        $kyc_docs= CompaniesType::where("id", "=", $company->type)
                ->first();

        return view('backend.freelancer.settings.index', compact('blade', 'company', 'user', 'team', 'bank', 'kyc_doc_objs', 'companyTypes', 'kyc_docs'));

    } else {

        return Redirect::to(env("MYHTTP"));
    }
}



    public function getCompany($user) {

        $blade["user"] = Auth::user();

        $provider = Companies::where("users_fk", "=", $user->id)
            ->where("delete", "=", "0")
            ->first();

        return $provider;

    }


    public function saveCompany() {

        $blade["user"] = Auth::user();
        $blade["ll"] = App::getLocale();

        $company = Companies::where("id", "=", $blade["user"]->service_provider_fk)
        ->where("delete", "=", "0")
        ->first();

        if(!isset($company)){
            $company = new Companies();
        }

        $company->type = $_POST["companyType"];
        $company->name = $_POST["firstname"];
        $company->birthday = $_POST["birthday"];
        $company->country_nationality = $_POST["nationality"];
        $company->country_residence = $_POST["country"];
        $company->city = $_POST["lastname"];
        $company->name = $_POST["company"];
        $company->city = $_POST["city"];
        $company->address = $_POST["address"];
        $company->users_fk =  $blade["user"]->id;
        $company->color =  $_POST["color"];
        $user = Users::find($blade["user"]->id);


        if($company->mango_id == null){

            $mango_obj = new MangoClass($this->mangopay);

            if($company->type == 1){
                $mango_user = $mango_obj->createNaturalUser($company, $user);
            }else{
                $mango_user=   $mango_obj->createLegalUser($company, $user);
            }

            $company->mango_id = $mango_user->Id;

        }




        $company->save();

        $user = Users::find($blade["user"]->id);
        $user->service_provider_fk = $company->id;
        $user->save();


        return Redirect::to($blade["ll"]."/freelancer/settings")->withInput()->with('success', 'Process successfully completed!');

    }

    public function saveAccount() {

        $blade["user"] = Auth::user();
        $blade["ll"] = App::getLocale();
        $provider = Provider::find($blade["user"]->service_provider_fk);

        $user = Users::find($blade["user"]->id);
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->email = $_POST["mail"];
        $user->phone = $_POST["phone"];

        $user->save();


        return view('backend.settings.index', compact('blade', 'user', 'provider'));

    }

    public function newTeamMember() {

        $blade["ll"] = App::getLocale();
        $blade["user"] = Auth::user();

        return view('backend.settings.new-team-member', compact('blade'));

    }

    public function saveTeamMember() {

        $blade["user"] = Auth::user();
        $blade["ll"] = App::getLocale();
        $provider = Provider::find($blade["user"]->service_provider_fk);

        $password = Hash::make($_POST["password"]);

        $user = new Users();
        $user->service_provider_fk = $provider->id;
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->email = $_POST["mail"];
        $user->phone = $_POST["phone"];
        $user->active = "1";
        $user->role = "0";
        $user->password = $password;

        $user->save();

        return Redirect::to($blade["locale"]."/provider/settings/")->withInput()->with('success', 'Process successfully completed!');

    }

    public function cancel() {

        $button = '<button type="button" class="btn btn-outline-dark load-content" id="new-team-member">New Team Member</button>';

        return $button;
    }

    public function reset(){

        $user = Auth::user();
        $ll = App::getLocale();

        //delete company
        $data = Companies::where("users_fk", "=", $user->id)
            ->where("delete", "=",  "0")
            ->first();

        $data->delete = 1;
        $data->save();

        //delete clients
        $data = Clients::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->get();

        foreach ($data as $client) {
            $client->delete = 1;
            $client->save();
        }

        //delete projects
        $data = Projects::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->get();

        foreach ($data as $project) {
            $project->delete = 1;
            $project->save();
        }

        //delete projects
        $data = Plans::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->get();

        foreach ($data as $plan) {
            $plan->delete = 1;
            $plan->save();
        }


        //delete company in users
        $data = Users::where("service_provider_fk", "=",  $user->service_provider_fk)
            ->where("delete", "=",  "0")
            ->first();

        $data->service_provider_fk = 0;
        $data->save();

        return Redirect::to("$ll/freelancer/dashboard?setup=yes")->with('ll', $ll);

    }


    public function resetPw() {

        $ll = App::getLocale();
        $user = Auth::user();

        if(self::pwCheck($_POST)== false){
            return back()->withInput()->with('error', 'Passwords do not match.');
        }

        $response = Users::where("email", "=",  $_POST['email'])
            ->where("id", "!=",  $user->id)
            ->first();

        if(isset($response)){
            return back()->withInput()->with('error', 'E-Mail already taken.');

        }else{

            $data = Users::where("id", "=", $user->id)
                ->where("delete", "=",  "0")
                ->first();

            $data->email = $_POST['email'];
            $data->password =  bcrypt(  $_POST["password"]);
            $data->save();

            return back()->withInput()->with('success', 'Data changed successful.');

        }


        if($response == false){
            return back()->withInput()->with('error', 'E-Mail already taken.');

        }else{

            $response = self::login();
            return Redirect::to("$ll/freelancer/dashboard?setup=yes")->with('ll', $ll);
        }


    }


    public function pwCheck($data) {
        if($data['password'] != $data['password_confirmation']) {

            return false;

        }else{
            return true;
        }
    }


    public function createMangoLegalUser($company, $freelancer) {
        try {

            // create user for payment
            $user = new MangoPay\UserLegal();

            $user->LegalPersonType = \MangoPay\LegalPersonType::Business;
            $user->Name = "Company Name";
            $user->Email = $freelancer->email;
            $user->LegalRepresentativeFirstName = $company->firstname;
            $user->LegalRepresentativeLastName = $company->lastname;
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


    public function saveBank() {

        $blade["user"] = Auth::user();
        $blade["ll"] = App::getLocale();

        $bank = App\DatabaseModels\CompaniesBank::where("service_provider_fk", "=", $blade["user"]->service_provider_fk)
            ->first();

        if(!isset($bank)){
            $bank = new App\DatabaseModels\CompaniesBank();
        }

        $bank->name = $_POST['name'];
        $bank->iban = $_POST['iban'];
        $bank->service_provider_fk = $blade["user"]->service_provider_fk;
        $bank->bic = $_POST['bic'];
        $bank->address1 = $_POST['address1'];
        $bank->address2 = $_POST['address2'];
        $bank->city = $_POST['city'];
        $bank->zip = $_POST['code'];
        $bank->country = $_POST['country_bank'];
        $bank->country = $_POST['country_iso'];
        $bank->save();


        return Redirect::to($blade["ll"]."/freelancer/settings")->withInput()->with('success', 'Process successfully completed!');


    }


    public function kycCheck(Request $request) {

        // Step1: create a document
        // Step2: add pages to the document
        // Step3: submit the document


        $user = Auth::user();
        $blade["ll"] = App::getLocale();

        $allowed_mimes = [
            "image/gif,
            image/png,
            image/jpeg,
            image/jpg,
            application/pdf"
        ];

        $validation = Validator::make($request->all(), [
            'image' => $allowed_mimes,
        ]);


        if($validation->passes())
        {

            $doctype = $_POST['type'];

            $company = Companies::where("id", "=",  $user->service_provider_fk)
                ->first();

            //check if there is a record in the DB for this kind of doc check
            $kyc_doc_obj = MangoKyc::where("company_id_fk", "=",  $user->service_provider_fk)
                ->where("doc_type", "=",  $doctype)
                ->where("status", "=",  "CREATED")
                ->first();

            $mango_obj = new MangoClass($this->mangopay);

            //check if a kyc check for this kind of doc type was already started and not finished
            if(empty($kyc_doc_obj)){

                $result =   $mango_obj->createKycDocument($company, $doctype);

                $kyc_doc_obj = new MangoKyc();
                $kyc_doc_obj->doc_type = $doctype;
                $kyc_doc_obj->company_id_fk = $user->service_provider_fk;
                $kyc_doc_obj->doc_type = $doctype;
                $kyc_doc_obj->created_id = $result->Id;
                $kyc_doc_obj->status = $result->Status;
                $kyc_doc_obj->save();

            }

            //convert uploaded file
            $file = base64_encode(file_get_contents($request->file('select_file')));

            //add page to document
            $result = $mango_obj->createKycPage($company, $kyc_doc_obj->created_id, $file);

            //check if page was added to the document
            if($result){
                $result = $mango_obj->submitKycDocument($company, $kyc_doc_obj->created_id);
            }else{
                Redirect::to($blade["ll"]."/freelancer/settings")->withInput()->with('error', "Insert page error");
            }

            //check if document was send
            if($result){

                //set status to submited
                $kyc_doc_obj = MangoKyc::where("company_id_fk", "=",  $user->service_provider_fk)
                    ->where("created_id", "=",  $kyc_doc_obj->created_id)
                    ->first();

                $kyc_doc_obj->status = "VALIDATION_ASKED";
                $kyc_doc_obj->save();


                return Redirect::to($blade["ll"]."/freelancer/settings")->withInput()->with('success', 'Process successfully completed!');
            }else{
                Redirect::to($blade["ll"]."/freelancer/settings")->withInput()->with('error', "Error sending the document");
            }


        } else{

            $error = $validation->errors()->all();

            return Redirect::to($blade["ll"]."/freelancer/settings")->withInput()->with('error', $error[1]);

        }


    }



}