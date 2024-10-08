<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


route::get('/user', [UserController::class, 'user']);

route::controller(AuthController::class)->group(function () {
    route::post('/signup', 'signup');
    route::post('/login', 'login');
});

route::controller(ChatController::class)->group(function () {
    route::get('/users', 'getUsers');
    route::post('/submit-messsage', 'submitMessage');
    route::get('/display-message/{senderID}/{receiverID}', 'displayMessage');
    //test public event for chat
    route::get('/test-event', 'testEvent');
});

Route::get('auth/google', [GoogleController::class, 'redirect']);
Route::get('auth/google/callback', [GoogleController::class, 'callBackGoogle']);


