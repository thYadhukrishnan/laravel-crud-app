<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/','FrontendController@homepage')->name('home');
Route::get('about-us','FrontendController@about')->name('about');
Route::get('contact-us','FrontendController@contact')->name('contact');
Route::get('new-user/{current_page}','FrontendController@create')->name('create');
Route::post('save','FrontendController@save')->name('save');
Route::get('edit/{userId}/{page}','FrontendController@edit')->name('edit');
Route::post('update','FrontendController@update')->name('update');
Route::get('delete/{userId}','FrontendController@delete')->name('delete');
Route::get('ajax',[FrontendController::class,'ajax'])->name('ajax');
Route::get('show',[FrontendController::class,'show'])->name('show');
Route::post('jsave',[FrontendController::class,'jsave'])->name('jsave');
Route::get('search',[FrontendController::class,'search'])->name('search');
Route::get('view',[FrontendController::class,'view'])->name('view');
Route::get('view-x',[FrontendController::class,'viewx'])->name('viewx');
Route::get('createx',[FrontendController::class,'createx'])->name('createx');
Route::post('savex',[FrontendController::class,'savex'])->name('savex');