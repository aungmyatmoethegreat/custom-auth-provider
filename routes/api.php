<?php

use Breeze\Breeze\Connectors\AuthConnector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Breeze\Breeze\Connectors\Requests\GetCitiesRequest;
use Breeze\Breeze\Connectors\Requests\GetInterestsRequest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function () {
//    $auth = new AuthConnector();
//    $cities = $auth->send(new GetCitiesRequest());
//    return $cities->json('data');

    return \Breeze\Breeze\Facades\Breeze::auth()->send(new GetInterestsRequest())->json();
});
