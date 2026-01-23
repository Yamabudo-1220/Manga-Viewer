<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

Route::get('/', [MangaController::class, 'index']);

Route::get('/', function () {
    return view('index');
});
