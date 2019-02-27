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
    public function send($mailTemplate, $recipient, $sender, $subject, $data){

        $lang = App::getLocale();

        Mail::send('emails.'.$mailTemplate, compact('data'), function ($message) use ($recipient, $sender, $subject) {
            $message->from('info@trustfy.io', 'Trustfy.io');
            $message->to($recipient);
            $message->subject($subject);
            $message->bcc("kuehn.sebastian@gmail.com");
        });

    }

    //global action save function
    public function save($typ, $id, $companyId, $content){


        $msg = new MessagesCompanies();
        $msg->typ   = $typ;
        $msg->unique_id    = $id;
        $msg->meassage    = $content;
        $msg->company_id_fk = $companyId;
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


    public function payInSucceeded($milestone, $plan) {


        $company = App\DatabaseModels\Companies::where("id", "=", $plan->service_provider_fk)
            ->first();

        $sender = "kuehn.sebastian@gmail.com";
        $recipient = "sebastian@trustfy.io";
        $mailTemplate = "payInSucceeded";
        $subject = trans('messages.payin_done_subject');

        $planUrl = env("APP_URL") . "/" . App::getLocale() . "/payment-plan/".$plan->hash;

        $data['content']=  trans('index.hello')." ". $company->name;
        $data['content'].= "<p><strong>".trans('messages.payin_done_1')."</strong></p>";
        $data['content'].= "<p>".trans('index.project').": ".$plan->projectName."<br>";
        $data['content'].= trans('index.milestone').": ".$plan->name."<br>";
        $data['content'].= trans('index.amount').": ".number_format($milestone->amount, 2, ',', ' ')." €</p>";
        $data['content'].= "<p><a href='".$planUrl."' target='_blank'>".trans('messages.show_plan')."</a>";
        $data['content'].= "<p>".trans('index.greetings')."</p>";
        $data['content'].= "<p>Panzerschwein</p>";

        $typ = 1;
        $id = $milestone->id;

        //check if msg was already send
        $exists = $this->check($typ, $id, $plan->service_provider_fk);

        if(!$exists){
            $this->send($mailTemplate, $recipient, $sender, $subject,  $data);
            $this->save($typ, $id, $plan->service_provider_fk, $data['content']);
        }

        $msg="";
        return $msg;

    }


}