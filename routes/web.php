<?php

use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::prefix('')->group(function (){
    Route::get('/',[TaskController::class,'index']);
    Route::get('/add',[TaskController::class,'create']);
    Route::post('/add',[TaskController::class,'store']);
    Route::get('/update/{id}',[TaskController::class,'edit']);
    Route::post('/update/{id}',[TaskController::class,'update']);
    Route::get('/{id}',[TaskController::class,'show']);
    Route::delete('/{id}',[TaskController::class,'close']);
});

Route::prefix('/trash')->group(function (){
    Route::get('/index',[TaskController::class,'closedIndex']);
    Route::get('/{id}',[TaskController::class,'showClosed']);
    Route::get('/restore/{id}',[TaskController::class,'restore']);
    Route::delete('/{id}',[TaskController::class,'destroy']);
});




