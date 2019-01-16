<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:12
 */



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::any('/freelancer/dashboard', 'Backend\Freelancer\DashboardController@index');
    Route::any('/freelancer/plan/create', 'Backend\Freelancer\PlanController@create');
    Route::any('/freelancer/clients', 'Backend\Freelancer\ClientManagementController@index');
    Route::any('/freelancer/clients/new', 'Backend\Freelancer\ClientManagementController@create');
    Route::any('/freelancer/clients/edit/{id}', 'Backend\Freelancer\ClientManagementController@edit');
    Route::any('/freelancer/clients/save/{id}', 'Backend\Freelancer\ClientManagementController@save');
    Route::any('/freelancer/clients/delete/{id}', 'Backend\Freelancer\ClientManagementController@delete');


});


