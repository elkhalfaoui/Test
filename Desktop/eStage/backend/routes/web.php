<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // echo Hash::make("0000") . "<br>";
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
