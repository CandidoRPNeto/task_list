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

Route::get('/', function () {
    return view('welcome');
});


// Task list
Route::prefix('/task')->group(function (){
    Route::get('/',[TaskController::class,'index']);
    Route::get('/complete',[TaskController::class,'completed']);
    Route::get('/find/{name}',[TaskController::class,'search']);
    Route::get('/add',[TaskController::class,'create']);
    Route::post('/add',[TaskController::class,'store']);
    Route::get('/update/{id}',[TaskController::class,'edit']);
    Route::post('/update/{id}',[TaskController::class,'update']);
    Route::get('/{id}',[TaskController::class,'show']);
    Route::delete('/{id}',[TaskController::class,'delete']);
});

// Task list in trash
Route::prefix('/trash')->group(function (){
    Route::get('/index',[TaskController::class,'deleteIndex']);
    Route::get('/{id}',[TaskController::class,'showDelete']);
    Route::get('/restore/{id}',[TaskController::class,'restore']);
    Route::delete('/{id}',[TaskController::class,'destroy']);
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
