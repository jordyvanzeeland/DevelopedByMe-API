<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

Route::group([
    'middleware' => 'api'
], function ($router) {
    Route::get("projects", 'App\Http\Controllers\ProjectsController@getAllProjects');
    Route::post("projects", 'App\Http\Controllers\ProjectsController@insertProject');
    Route::get("project/{id}", 'App\Http\Controllers\ProjectsController@getProject');
    Route::put("project/{id}", 'App\Http\Controllers\ProjectsController@updateProject');
    Route::delete("project/{id}", 'App\Http\Controllers\ProjectsController@deleteProject');
});


