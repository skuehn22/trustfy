<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 08.10.2018
 * Time: 11:44
 */


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /* Provider Dashboard */
    Route::any('/applaud/admin/dashboard', 'Backend\PilotApplaud\DashboardController@index') ;
    Route::any('/applaud/admin/calculate-offer', 'Backend\PilotApplaud\OfferController@index') ;
    Route::any('/applaud/admin/set-escrow', 'Backend\PilotApplaud\EscrowController@index') ;

});