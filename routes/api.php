<?php

use Breeze\Breeze\Connectors\AuthConnector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (AuthConnector $authConnector) {

    Redis::publish('create:user', json_encode(['name' => 'John Doe']));

    return response()->json(['message' => 'hey']);


//    $auth = new AuthConnector();
//    $cities = $authConnector
//        ->debugRequest(static function (PendingRequest $pendingRequest, Requestinterface $psrRequest) {
//            dd($pendingRequest->headers());
//        })
//        ->send(new GetCitiesRequest());
//    return $cities->json('data');

//    return \Breeze\Breeze\Facades\Breeze::auth()
//        ->debugRequest(static function (PendingRequest $pendingRequest, Requestinterface $psrRequest) {
////            dd($pendingRequest->headers());
//        })
//        ->send(new GetInterestsRequest())->json('data');
});
