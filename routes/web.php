<?php

use App\Http\Controllers\AuthController;
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
    if (session()->get('uname') == 'admin' && session()->get('passwd') == 'admin123') {
        return redirect()->route('admin');
    } else {
        return view('login');
    }
})->name('/');
Route::post('/', [AuthController::class, 'adminLogin'])->name('adminLogin');
Route::get('/admin', function () {
    if (session()->get('uname') == 'admin' && session()->get('passwd') == 'admin123') {
        return view('admin');
    } else {
        return redirect()->route('/');
    }
})->name('admin');
Route::post('/admin', [AuthController::class, 'adminPanel'])->name('adminPanel');
Route::get('/add_user', function () {
    if (session()->get('uname') == 'admin' && session()->get('passwd') == 'admin123') {
        return view('user_add');
    } else {
        return redirect()->route('/');
    }
})->name('add_user');
Route::post('/add_user', [AuthController::class, 'addUser'])->name('addUser');
Route::get('/table', [AuthController::class, 'getData'])->name('table');
Route::post('/table', [AuthController::class, 'backToAdmin'])->name('backToAdmin');
Route::get('/forgot_passwd', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot_passwd', function () {
    return redirect()->route('/');
})->name('backToLogin');
