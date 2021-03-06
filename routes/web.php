<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Requests\ContactRequest;

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

Route::get('/', [ContactController::class,'index'])->name('contact.index');
Route::post('/confirm',[ContactController::class,'confirm'])->name('contact.confirm');
Route::post('/thanks', [ContactController::class, 'create']);
Route::get('find',[ContactController::class, 'find'])->name('contact.find');
Route::get('find',[ContactController::class, 'search']);
Route::post('/delete', [ContactController::class, 'delete'])->name('contact.delete');


