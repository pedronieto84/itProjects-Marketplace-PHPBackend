<?php

use App\Http\Controllers\HomeController;
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

Route::get('/getUser',function(){
  return response()->json([
        'salute' => 'Hello World!',
    ]);
});
   
Route::post('/createUser',function(){
    return response()->json([
        'salute' => 'Hello World!',
    ]);
});
