<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:12
 */



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::auth();
    Route::get('/', 'HomeController@index') ;

});


