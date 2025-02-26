<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Matrix Admin', function()
{
return view('index',[
    "menu"=>"dashboard"
]);
})->name('Matrix Admin');

Route::get('/Login', function()
{
return view('login',[
    "menu"=>"login"
]);
})->name('Login');