<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/single-action', SingleActionController::class);

Route::group(['prefix' => 'customer'], function(){
    Route::get('/', function (){
        return "customer list";
    });
    Route::get('/add', function () {
        return "customer add";
    });
    Route::get('/edit/{id}', function ($id) {
        return "customer edit {$id}";
    });
});

Route::fallback(function(){
    return 'page not found';
});


