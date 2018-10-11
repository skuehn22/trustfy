<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 11.10.2018
 * Time: 09:32
 */


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /* Provider Dashboard */
    Route::any('/samples/onlinetradesmen/create-offer', 'Backend\Samples\OnlineTradesmenController@createOffer') ;
    Route::any('/samples/onlinetradesmen/builder-dashboard', 'Backend\Samples\OnlineTradesmenController@builderDashboard') ;

});