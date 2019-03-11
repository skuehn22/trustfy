<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 31.01.2019
 * Time: 13:13
 */

namespace App\Classes;
use App\DatabaseModels\Users;
use App\Http\Requests\Request;

use App\DatabaseModels\MessagesCompanies;

class UsersClass
{

    public function saveUser($data) {


        if(isset($data["email"])){
            $checkUser = Users::where("email", "=", $data["email"])->first();
        }

        if(empty($checkUser)) {

            $users = new Users();
            $users->email = $data["email"];
            $users->password =  bcrypt(  $data["password"]);
            $users->active = "0";
            $users->role = 3;
            $users->remember_token = $data["_token"];
            $users->save();

            $msg = new MessagesCompanies();
            $msg->users_id_fk   = $users->id;
            $msg->typ   = 3;
            $msg->unique_id    = $users->id;
            $msg->meassage    = "Hello, welcome to Trustfy. If you have any problems, ask Anika.";
            $msg->save();


            $data['email'] = $users->email;
            $data['password'] = $users->password;


            return $data;


        } else {

            return false;

        }

    }

    public function createCompany($data) {

    }


}