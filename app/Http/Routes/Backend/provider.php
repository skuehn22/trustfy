<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.08.2018
 * Time: 11:44
 */


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    /* Provider Dashboard */
    Route::any('/provider/dashboard', 'Backend\Provider\DashboardController@index') ;

    /* Provider Contracts */
    Route::any('/provider/contract-types', 'Backend\Provider\ContractsController@getTypes') ;

    /* Provider Settings */
    Route::any('/provider/settings', 'Backend\Provider\SettingsController@index') ;
    Route::any('/provider/settings/save-company', 'Backend\Provider\SettingsController@saveCompany') ;

});