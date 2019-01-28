<?php

namespace App\Http\Controllers;
// Libraries
use App, Auth, Redirect, Session, Mail, Input, Validator, Lang, Route;
use App\Http\Requests;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

use App\DatabaseModels\Newsletter;



class LoginController extends Controller
{
    public function login() {
        // Getting all post data
        $data = Input::all();
        $ll = App::getLocale();

        // Applying validation rules.
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:2',
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            // If validation falis redirect back to login.

            $msg_wrong_login = "bla";

            return Redirect::to("$ll/reviews")->withInput()->with('error', 'Konto ist inaktiv!');
        }
        else {

            $msg_wrong_login = "bla";

            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            // doing login.
            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata)) {
                    $user = Auth::user();
                    if($user->active == "1") {

                        if($user->role == 0 || $user->role ==200 ) {

                            if($user->setup == 0) {
                                return Redirect::to("$ll/freelancer/setup/welcome")->with('ll', $ll);
                            }else{
                                return Redirect::to("$ll/freelancer/dashboard")->with('ll', $ll);
                            }

                        }

                    } else {
                        return Redirect::to("$ll")->withInput()->with('error', 'Konto ist inaktiv!');
                    }

                }
            }
            else {
                 return Redirect::to("$ll")->withInput()->with('error', 'Logindaten fehlerhaft!');
            }
        }
    }

    public function loginCheckout() {
        // Getting all post data
        $data = Input::all();
        $ll = App::getLocale();

        // Applying validation rules.
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:2',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            // If validation falis redirect back to login.
            return Redirect::route('bookingPerson')->withInput()->with('error', 'Logindaten fehlerhaft!');
        }
        else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
            // doing login.
            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata)) {
                    $user = Auth::user();
                    if($user->active == "true") {

                        if($user->type == 0 || $user->type ==200 ) {
                            return Redirect::route('bookingPerson');
                        }
                        if ($user->type == 6 || $user->type == 1 ) {
                            return Redirect::to("$ll/");
                        }

                        if($user->type > 1 && $user->type !=200) {
                            return Redirect::intended("$ll/backend");
                        }


                    } else {
                        return Redirect::route('bookingPerson')->withInput()->with('error', 'Konto ist inaktiv!');
                    }

                }
            }
            else {
                // if any error send back with message.
                if (isset($_POST['step4']) && ($_POST['step4'] == 1)) {
                    return Redirect::route('bookingPerson')->withInput()->with('error', 'Logindaten fehlerhaft!');

                }else{
                    return Redirect::route('bookingPerson')->withInput()->with('error', 'Logindaten fehlerhaft!');
                }



            }
        }
    }

    public function logout() {

        if(!isset($_GET['basket'])){
            $ll = App::getLocale();
            Auth::logout(); // logout user
            return Redirect::to("$ll/"); //redirect back to login
        }else{
            $ll = App::getLocale();
            Auth::logout(); // logout user
            return Redirect::route('bookingPerson');
        }


    }

    public function register() {

        $customerDetailsObj = new CustomerDetails();
        $response = $customerDetailsObj->saveUser();

        if($response == false){
            return Redirect::route('bookingPerson')->withInput()->with('error', 'E-Mail bereits vergeben.');
            //return Redirect::route('bookingPerson')->withInput()->with('error', 'Vielen Dank f�r deine Registrierung!');
        }else{

            // Getting all post data
            $data['password'] = $_POST["pw"];
            $data['email'] = $_POST["mail_register"];
            $ll = App::getLocale();

            // Applying validation rules.
            $rules = array(
                'email' => 'required|email',
                'password' => 'required|min:2',
            );

            $validator = Validator::make($data, $rules);

            if ($validator->fails()){
                // If validation falis redirect back to login.

                return Redirect::to("$ll")->withInput()->with('error', 'Logindaten fehlerhaft!');
            }
            else {
                $userdata = array(
                    'email' => $_POST["mail_register"],
                    'password' => $_POST["pw"]
                );
                // doing login.
                if (Auth::validate($userdata)) {
                    if (Auth::attempt($userdata)) {
                        $user = Auth::user();
                        if($user->active == "true") {

                            if($user->type == 0 || $user->type ==200 ) {
                                $msg_login = Lang::get('frontend.login_controller_msg_login');
                                return Redirect::route('bookingPerson')->withInput()->with('success', $msg_login);;
                            }
                            if ($user->type == 6 || $user->type == 1 ) {
                                return Redirect::to("$ll/");
                            }

                            if($user->type > 1 && $user->type !=200) {
                                return Redirect::intended("$ll/backend");
                            }


                        } else {
                            return Redirect::to("$ll")->withInput()->with('error', 'Konto ist inaktiv!');
                        }

                    }
                }
                else {
                    // if any error send back with message.
                    if (isset($_POST['step4']) && ($_POST['step4'] == 1)) {
                        return Redirect::to("$ll/hotel/person")->withInput()->with('error', 'Logindaten fehlerhaft!');
                    }else{
                        return Redirect::to("$ll")->withInput()->with('error', 'Logindaten fehlerhaft!');
                    }
                }
            }
        }

    }

    public function reset() {

        return view('auth.passwords.reset', compact('blade'));

    }

}