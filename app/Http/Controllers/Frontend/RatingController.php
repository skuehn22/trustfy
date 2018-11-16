<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 12.11.2018
 * Time: 11:53
 */

namespace App\Http\Controllers\Frontend;

use App, Session, Mail, Hash;

use App\Http\Controllers\Controller;
use App\DatabaseModels\ItemRating;
use App\DatabaseModels\Rating;

class RatingController extends Controller
{


    public function create() {

        $blade["locale"] = App::getLocale();
        $session = Session::get('user_session');
        return view('frontend.rating.create', compact('blade'));

    }

    public function invite() {

        $blade["locale"] = App::getLocale();
        $session = Session::get('user_session');
        return view('frontend.rating.invite', compact('blade'));

    }

    public function open() {

        $blade["locale"] = App::getLocale();
        $session = $_GET['hash'];
        $rating = Rating::where("session", "=", $session)
            ->first();

        return view('frontend.rating.open', compact('blade', 'rating'));

    }

    public function save() {

        $blade["locale"] = App::getLocale();

        $pwd = Hash::make($_POST['pwd']);

        $rating = new Rating();
        $rating->name = $_POST['name'];
        $rating->description = $_POST['description'];
        $rating->email_freelancer = $_POST['freelancer-mail'];
        $rating->email_client = $_POST['client-mail'];
        $rating->name_client = $_POST['name-client'];
        $rating->project_name = $_POST['project-name'];
        $rating->session = Hash::make(time());
        $rating->pwd = $pwd;
        $rating->save();
        $msg= "Thank you for your creating this review link.";

        Mail::send('emails.rating', compact('rating'), function ($message) use ($rating) {
            $message->from('kuehn.sebastian@gmail.com', 'trustfy.com');
            $message->to($rating->email_client, "Klaus" . " " . "Rummler")->
            subject('trustfy.com - Review');
        });


        return view('frontend.rating.add', compact('blade', 'msg', 'rating'));

    }


    public function store() {

        $blade["locale"] = App::getLocale();
        $itemId = "123445";
        $userID = 1234567;

        $rating = Rating::where("session", "=", $_POST['session'])
            ->first();

        if(!empty($_POST['rating']) && !empty($itemId)){


            $user = new ItemRating();
            $user->itemId = $itemId;
            $user->userId = $userID;
            $user->ratingNumber = $_POST['rating'];
            $user->title = $_POST['title'];
            $user->comments = $_POST['comment'];
            $user->session = $_POST['session'];

            $user->save();

            $msg= "Thank you for your review.";

            Mail::send('emails.rating-received', compact('rating', 'user'), function ($message) use ($rating) {
                $message->from('kuehn.sebastian@gmail.com', 'trustfy.com');
                $message->to($rating->email_freelancer, "Klaus" . " " . "Rummler")->
                subject('trustfy.com - Rating received');
            });

            return view('frontend.rating.closed', compact('blade', 'msg'));
        }
    }

    public function getOverview() {

        $blade["locale"] = App::getLocale();

        return view('frontend.rating.freelancer-overview', compact('blade', 'msg'));

    }

}