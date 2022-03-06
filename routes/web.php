<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CharacterController;
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
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
});
Route::get('/thank-you', function () {
    return view('thank-you');
});
Route::post('/submit-register',[HomeController::class,'submitRegister'])->name('submit.register');
Route::post('/submit-login',[HomeController::class,'submitLogin'])->name('submit.login');

Route::group(['middleware' => 'auth:web'], function() {
	Route::get('/characters',[HomeController::class,'getAllCurlData'])->name('curldata');
	Route::get('characters/{id}',[CharacterController::class,'characterDetail']);
	Route::get('save-character/{userid}/{character_id}',[CharacterController::class,'saveCharacter']);
	Route::get('delete-character/{userid}/{character_id}',[CharacterController::class,'deleteCharacter']);
	Route::get('/user/characters',[CharacterController::class,'savedCharecterList']);
	Route::get('/logout', function () {
	     Auth::logout();
	  return redirect('/');
	});
});