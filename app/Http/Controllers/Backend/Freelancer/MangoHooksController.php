<?php


namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth;

use App\Http\Controllers\Controller;
use App\DatabaseModels\MangoHooks;
use App\DatabaseModels\MangoKyc;
use App\DatabaseModels\Companies;
use App\DatabaseModels\Users;
use App\Classes\MessagesClass;

class MangoHooksController extends Controller
{

    public function receive()
    {
        $hook = new MangoHooks();
        $hook->type = $_GET['EventType'];
        $hook->ressourceId = $_GET['RessourceId'];
        $hook->save();

        switch ($hook->type) {

            case "KYC_SUCCEEDED":



                $kycdoc = MangoKyc::where("created_id", "=", $hook->ressourceId)
                    ->first();
;
                $user = Users::where("service_provider_fk", "=", $kycdoc->company_id_fk)
                    ->first();


                $subject = "Trustfy Payments - KYC susseeded";
                $data['content'] = "Congratulations You have completed the KYC procedure.";
                $msg_obj = new MessagesClass();
                $msg_obj->sendStandardMail($subject, $data, $user->email);

                break;
            case "blue":
                echo "Your favorite color is blue!";
                break;
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";

        }


    }

}