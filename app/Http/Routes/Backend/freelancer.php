<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:12
 */



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::get('/ajax_upload', 'AjaxUploadController@index');
    Route::post('/ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');


    Route::any('/freelancer/dashboard', 'Backend\Freelancer\DashboardController@index');
    Route::any('/freelancer/plan/create', 'Backend\Freelancer\PlanController@create');

    Route::any('/freelancer/setup/welcome', 'Backend\Freelancer\SetupController@index');
    Route::any('/freelancer/setup/save/save-company', 'Backend\Freelancer\SetupController@company');
    Route::any('/freelancer/setup/save/save-client', 'Backend\Freelancer\SetupController@client');

    Route::any('/freelancer/clients', 'Backend\Freelancer\ClientManagementController@index');
    Route::any('/freelancer/clients/new', 'Backend\Freelancer\ClientManagementController@create');
    Route::any('/freelancer/clients/edit/{id}', 'Backend\Freelancer\ClientManagementController@edit');
    Route::any('/freelancer/clients/save/{id}', 'Backend\Freelancer\ClientManagementController@save');
    Route::any('/freelancer/clients/delete/{id}', 'Backend\Freelancer\ClientManagementController@delete');
    Route::any('/freelancer/clients/get-by-id', 'Backend\Freelancer\ClientManagementController@getById');

    Route::any('/freelancer/projects', 'Backend\Freelancer\ProjectManagementController@index');
    Route::any('/freelancer/projects/new', 'Backend\Freelancer\ProjectManagementController@create');
    Route::any('/freelancer/projects/edit/{id}', 'Backend\Freelancer\ProjectManagementController@edit');
    Route::any('/freelancer/projects/save/{id}', 'Backend\Freelancer\ProjectManagementController@save');
    Route::any('/freelancer/projects/delete/{id}', 'Backend\Freelancer\ProjectManagementController@delete');
    Route::any('/freelancer/projects/by-client', 'Backend\Freelancer\ProjectManagementController@getByClients');
    Route::any('/freelancer/projects/get-by-id', 'Backend\Freelancer\ProjectManagementController@getById');

    Route::any('/freelancer/plans', 'Backend\Freelancer\PlansManagementController@index');
    Route::any('/freelancer/plans/new', 'Backend\Freelancer\PlansManagementController@create');
    Route::any('/freelancer/plans/edit/{id}', 'Backend\Freelancer\PlansManagementController@edit');
    Route::any('/freelancer/plans/save/{id}', 'Backend\Freelancer\PlansManagementController@save');
    Route::any('/freelancer/plans/sclose/{id}', 'Backend\Freelancer\PlansManagementController@saveAndClose');
    Route::any('/freelancer/plans/delete/{id}', 'Backend\Freelancer\PlansManagementController@delete');




});


