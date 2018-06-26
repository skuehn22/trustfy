<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 26.06.2018
 * Time: 14:12
 */

Route::auth();
Route::get('/', 'HomeController@index') ;