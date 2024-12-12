<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskController;

Route::get('',[TaskController::class,'index']);
Route::post('create',[TaskController::class,'store']);
Route::put('update/{id}',[TaskController::class,'update']);
Route::put('destroy/{id}',[TaskController::class,'destroy']);
Route::get('{id}',[TaskController::class,'show']);
