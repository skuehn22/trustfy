<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 01.08.2018
 * Time: 11:44
 */


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::any('/provider/dashboard', 'Backend\Provider\DashboardController@index') ;
    Route::any('/provider/contract-types', 'Backend\Provider\ContractsController@getTypes') ;
    Route::any('/provider/settings', 'Backend\Provider\SettingsController@index') ;

});