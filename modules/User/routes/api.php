<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\AuthController;


Route::post("register",[AuthController::class,'register']);
Route::post("login",[AuthController::class,'login']);
Route::post("logout",[AuthController::class,'logout']);

