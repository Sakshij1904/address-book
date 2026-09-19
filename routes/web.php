<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;

Route::resource('groups', GroupController::class)
    ->only(['index', 'store', 'destroy']);


Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::resource('contacts', ContactController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);