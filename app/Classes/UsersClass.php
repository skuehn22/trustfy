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
            $users->active = "1";
            $users->role = 3;
            $users->remember_token = $data["_token"];
            $users->save();

            $data['email'] = $users->email;
            $data['password'] = $users->password;


            return $data;


        } else {

            return false;

        }

    }


}