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

    Route::any('/freelancer/projects', 'Backend\Freelancer\ProjectManagementController@index');
    Route::any('/freelancer/projects/new', 'Backend\Freelancer\ProjectManagementController@create');
    Route::any('/freelancer/projects/edit/{id}', 'Backend\Freelancer\ProjectManagementController@edit');
    Route::any('/freelancer/projects/save/{id}', 'Backend\Freelancer\ProjectManagementController@save');
    Route::any('/freelancer/projects/delete/{id}', 'Backend\Freelancer\ProjectManagementController@delete');

    Route::any('/freelancer/projects/plans', 'Backend\Freelancer\ProjectPlanManagementController@index');
    Route::any('/freelancer/projects/plans/new', 'Backend\Freelancer\ProjectPlanManagementController@create');
    Route::any('/freelancer/projects/plans/edit/{id}', 'Backend\Freelancer\ProjectPlanManagementController@edit');
    Route::any('/freelancer/projects/plans/save/{id}', 'Backend\Freelancer\ProjectPlanManagementController@save');
    Route::any('/freelancer/projects/plans/delete/{id}', 'Backend\Freelancer\ProjectPlanManagementController@delete');




});


