<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('instruktur/login');
});
// Route::get('/', function () {
//     return view('welcome');
// });
