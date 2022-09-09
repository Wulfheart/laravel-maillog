<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config('maillog.prefix'))->group(function () {
    Route::get('/', function () {
        return "HELLO";
    });
    Route::get('/', function () {
        return "HELLO";
    });
});
