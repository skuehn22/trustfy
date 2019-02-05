<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {



        if($this->isHttpException($e))
        {
            if(env("APP_ENV") == "local") {

                return parent::render($request, $e);


            } else {
                $test = "";
                switch ($e->getStatusCode()) {
                    // not found
                    case 404:


                        $str = $request." \n --------------- \n".$e;

                        Mail::raw($str, function ($message) {
                            $message->from('info@trustfy');
                            $message->subject("trustfy Error");
                            $message->to('kuehn.sebastian@gmail.com');
                        });


                        $content="<br><br><br><h2>Ooooops!</h2>";
                        $content.= Lang::get('frontend.handler_error_occured');
                        $content.="<br><br>Gerne kannst du deine Anfrage an uns per E-Mail senden und <br>wir schicken dir das passende Angebot zu: ";
                        $content.="<a style='color:red;' href='mailto:info@herden-tt.com'>info@herden-tt.com</a><br><br><br><br>";

                        return Response::view('errors.404',compact('content'));
                        break;
                    // internal error
                    case '500':



                        $str = $request." \n --------------- \n".$e;

                        Mail::raw($str, function ($message) {
                            $message->from('info@trustfy');
                            $message->subject("trustfy Error");
                            $message->to('kuehn.sebastian@gmail.com');
                        });


                        $content="<br><br><br><h2>Ooooops!</h2>";
                        $content.= Lang::get('frontend.handler_error_occured');
                        $content.="<br><br>Gerne kannst du deine Anfrage an uns per E-Mail senden und <br>wir schicken dir das passende Angebot zu: ";
                        $content.="<a style='color:red;' href='mailto:info@herden-tt.com'>info@herden-tt.com</a><br><br><br><br>";


                        return Response::view('errors.404',compact('content'));
                        break;

                    default:
                        $content="<br><br><br><h2>Ooooops!</h2>";
                        $content.= Lang::get('frontend.handler_error_occured');
                        $content.="<br><br>Gerne kannst du deine Anfrage an uns per E-Mail senden und <br>wir schicken dir das passende Angebot zu: ";
                        $content.="<a style='color:red;' href='mailto:info@herden-tt.com'>info@herden-tt.com</a><br><br><br><br>";
                        return Response::view('errors.404',compact('content'));
                        break;
                }
            }
        }
        else
        {
            if(env("APP_ENV") == "local") {

                return parent::render($request, $e);

            } else {

                $str = $request." \n --------------- \n".$e;

                Mail::raw($str, function ($message) {
                    $message->from('info@trustfy.io');
                    $message->subject("trustfy Error");
                    $message->to('kuehn.sebastian@gmail.com');
                });


                $cities = Cities::where("hidden", "=", "0")
                    ->orderBy('name', 'asc')
                    ->lists("name","id");

                $content="<br><br><br><h2>Ooooops!</h2>";
                $content.= Lang::get('frontend.handler_error_occured');
                $content.="<br><br>Gerne kannst du deine Anfrage an uns per E-Mail senden und <br>wir schicken dir das passende Angebot zu: ";
                $content.="<a style='color:red;' href='mailto:info@herden-tt.com'>info@herden-tt.com</a><br><br><br><br>";
                return Response::view('errors.404',compact('content', 'cities', 'blade'));

            }
        }
    }
}
