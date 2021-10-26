<?php

use App\Test;
use App\Container;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\TestFacade;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    //dd(app('test')->execute());
    return view('welcome');
});


Route::resource('posts', HomeController::class)->middleware(['auth:sanctum', 'verified']);

Route::get('logout', [AuthController::class,'logout']);

Route::middleware(['auth:sanctum', 'verified'])->get('/posts',[HomeController::class, 'index']);
