<?php


namespace App\Http\Controllers\Backend\Freelancer;

// Libraries
use App, Auth;

use App\Http\Controllers\Controller;
use App\DatabaseModels\MangoHooks;
use App\DatabaseModels\MangoKyc;
use App\DatabaseModels\MessagesCompanies;
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

                $subject = "Trustfy Payments - KYC document accepted";
                $data['content'] = $kycdoc->doc_type." accepted";
                $msg_obj = new MessagesClass();
                $msg_obj->sendStandardMail($subject, $data, $user->email);

                $msg = new MessagesCompanies();
                $msg->typ   = 2;
                $msg->unique_id    =  $hook->ressourceId;
                $msg->meassage    = $data['content'];
                $msg->company_id_fk = $kycdoc->company_id_fk;
                $msg->projects_id_fk = "";
                $msg->save();

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