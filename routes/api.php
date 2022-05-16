<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\UserController;

Route::post('token', [AuthController::class, 'login'])->name('login');
Route::apiResources(['users' => UserController::class,]);



