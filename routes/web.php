<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/admin-only', function() {
    return 'Welcome Admin!';
})->middleware('is_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/single-action', SingleActionController::class);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'handleLogin'])->name('login.submit');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/update/{order}', [OrderController::class, 'update'])->name('orders.update');

Route::get('/file', [FileController::class, 'file'])->name('file');
Route::post('/file', [FileController::class, 'fileUpload'])->name('file.upload');
Route::get('/file/delete', [FileController::class, 'fileDelete'])->name('file.delete');
Route::get('/file/download', [FileController::class, 'fileDownload'])->name('file.download');

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/admin', [ProfileController::class, 'adminArea']);
Route::get('/profile/public/{username}', [ProfileController::class, 'publicProfile']);

Route::get('/send-mail', function() {
    Mail::to('azi.fiftytwo@gmail.com')->send(new TestEmail('John', 'https://laravel.com'));
    return 'Email sent (check Mailtrap inbox)';
});

Route::fallback(function(){
    return 'page not found';
});


