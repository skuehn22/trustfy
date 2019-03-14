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


class MessagesClass  extends Controller
{

    //global sender function
    public function send($mailTemplate, $recipient, $subject, $data, $client, $plan, $milestone, $planUrl){

        Mail::send('emails.'.$mailTemplate, compact('data', 'client', 'plan', 'milestone', 'planUrl'), function ($message) use ($recipient, $subject) {
            $message->from('info@trustfy.io', 'Trustfy - Payment Plans');
            $message->to($recipient);
            $message->bcc('bcc@trustfy.io');
            $message->subject($subject);
        });

    }

    //global action save function
    public function save($typ, $id, $companyId, $content, $projectId){
        $msg = new MessagesCompanies();
        $msg->typ   = $typ;
        $msg->unique_id    = $id;
        $msg->meassage    = $content;
        $msg->company_id_fk = $companyId;
        $msg->projects_id_fk = $projectId;
        $msg->save();

    }

    //checks if msg was already send (maybe the client refreshs his page mulitple times)
    public function check($typ, $id, $companyId){

        $result = MessagesCompanies::where("typ", "=", $typ)
            ->where("unique_id", "=", $id)
            ->where("company_id_fk", "=", $companyId)
            ->first();

        if(empty($result)){
            return false;
        }else{
            return true;
        }

    }

    public function sendStandardMail($subject, $data, $recipient) {

        $mailTemplate = "payInSucceeded";
        $this->send($mailTemplate, $recipient, $subject,  $data);

    }


    public function payInSucceeded($milestone, $plan, $user) {


        $company = App\DatabaseModels\Companies::where("id", "=", $plan->service_provider_fk)
            ->first();

        $client = Clients::where("service_provider_fk", "=", $plan->clients_id_fk)
            ->first();


        $recipient = $user->email;
        $mailTemplate = "payInSucceeded";
        $subject = trans('messages.subject_typ_1');

        $planUrl = env("APP_URL") . "/" . App::getLocale() . "/payment-plan/".$plan->hash;
        $data['content']="";


        $typ = 1;
        $id = $milestone->id;

        //check if msg was already send
        $exists = $this->check($typ, $id, $plan->service_provider_fk);

        if(!$exists){
            $this->send($mailTemplate, $recipient, $subject,  $data, $client, $plan, $milestone, $planUrl);
            $this->save($typ, $id, $plan->service_provider_fk, $data['content'], $plan->projects_id_fk);
        }

        $msg="";
        return $msg;

    }


}