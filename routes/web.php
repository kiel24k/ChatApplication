<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');



