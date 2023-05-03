<?php

use App\Http\Controllers\KooraNewsController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Goutte\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('welcome');
});

Route::get('koora',[KooraNewsController::class,'koora'])->name('koora');


Route::get('/coronavirus',[MainController::class,'index'])->name('index');

