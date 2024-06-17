<?php
use App\Http\Controllers\Api as Api;
use App\Http\Controllers\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [Auth\RegisterController::class, 'store']);
Route::post('login', [Auth\LoginController::class, 'store']);

Route::apiResource('posts', Api\PostController::class)->middleware('auth:sanctum');
