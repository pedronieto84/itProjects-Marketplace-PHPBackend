<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cursos/{num}', HomeController::class );

Route::get('/getUsers', [UserController::class,'index']);
Route::get('/getUser/{userId}', [UserController::class,'show']);
Route::post('/createUser', [UserController::class,'store']);
Route::post('/deleteUser/{userId}', [UserController::class,'destroy']);
Route::post('/updateUser/{userId}', [UserController::class,'update']);

