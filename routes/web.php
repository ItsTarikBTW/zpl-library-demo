<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZPLController;

Route::post('/upload-template', [ZPLController::class, 'uploadTemplate']);
Route::post('/generate-zpl/{id}', [ZPLController::class, 'generate']);

Route::get('/', function () {
    return view('welcome');
});
