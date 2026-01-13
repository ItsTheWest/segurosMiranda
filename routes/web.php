<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/formulario', function () {
    return view('formulario');
});

Route::get('/lista', function () {
    return view('lista'); // Asegúrate de tener una vista llamada 'lista.blade.php'
})->name('ver.lista');

route::post('/submit-form', [App\Http\Controllers\peronascontrol::class, 'insertar'])->name('submit.form');