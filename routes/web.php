<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/formulario', function () {
    return view('formulario');
})->name('formulario');

Route::get('/lista', [App\Http\Controllers\peronascontrol::class, 'verlista'])->name('ver.lista');

route::post('/submit-form', [App\Http\Controllers\peronascontrol::class, 'insertar'])->name('submit.form');


