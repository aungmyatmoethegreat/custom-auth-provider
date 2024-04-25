<?php

use Breeze\Breeze\Connectors\AuthConnector;
use Breeze\Breeze\Connectors\Requests\GetInterestsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Http\Message\RequestInterface;
use Saloon\Http\PendingRequest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function (AuthConnector $authConnector) {
//    $auth = new AuthConnector();
//    $cities = $authConnector
//        ->debugRequest(static function (PendingRequest $pendingRequest, Requestinterface $psrRequest) {
//            dd($pendingRequest->headers());
//        })
//        ->send(new GetCitiesRequest());
//    return $cities->json('data');

    return \Breeze\Breeze\Facades\Breeze::auth()
        ->debugRequest(static function (PendingRequest $pendingRequest, Requestinterface $psrRequest) {
//            dd($pendingRequest->headers());
        })
        ->send(new GetInterestsRequest())->json('data');
});
