<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agama44Controller;
use App\Http\Controllers\User44Controller;
use App\Http\Controllers\Detail_data44Controller;
use Illuminate\Support\Facades\Auth;

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

    if (Auth::check()) {
        $role = Auth::user()->role;
    } else {
        $role = null;
    }

    return view('dashboard', [
        'role'=>$role
    ]);
})->name('index44');

Route::middleware(['auth', 'hakakses:role'])->group(function () {

    // User
    Route::get('/users44', [User44Controller::class, 'users44'])->name('users44');
    Route::get('/detailUser44/{id}', [User44Controller::class, 'detailUser44'])->name('detailUser44');
    Route::get('/profile44', [User44Controller::class, 'profile44'])->name('profile44');


    Route::get('/updatePassword44', [User44Controller::class, 'updatePassword44'])->name('updatePassword44');
    Route::post('/updatePasswordProses44/{id}', [User44Controller::class, 'updatePasswordProses44'])->name('updatePasswordProses44');


    Route::get('/logout44', [User44Controller::class, 'logout44'])->name('logout44');

    // Detail data
    Route::get('/detailData44', [Detail_data44Controller::class, 'detailData44'])->name('detailData44');

    Route::get('/createData44', [Detail_data44Controller::class, 'createData44'])->name('createData44');
    Route::post('/createDataProses44', [Detail_data44Controller::class, 'createDataProses44'])->name('createDataProses44');

    Route::get('/updateData44', [Detail_data44Controller::class, 'updateData44'])->name('updateData44');
    Route::post('/updateDataProses44', [Detail_data44Controller::class, 'updateDataProses44'])->name('updateDataProses44');
});

Route::middleware(['auth', 'hakadmin:role'])->group(function () {
    // agama
    Route::get('/agama44', [Agama44Controller::class, 'agama44'])->name('agama44');

    Route::get('/createAgama44', [Agama44Controller::class, 'createAgama44'])->name('createAgama44');
    Route::post('/createAgama44Proses', [Agama44Controller::class, 'createAgama44Proses'])->name('createAgama44Proses');

    Route::get('/deleteAgama44Proses/{id}', [Agama44Controller::class, 'deleteAgama44Proses'])->name('deleteAgama44Proses');

    Route::get('/updateAgama44/{id}', [Agama44Controller::class, 'updateAgama44'])->name('updateAgama44');
    Route::post('/updateAgama44Proses/{id}', [Agama44Controller::class, 'updateAgama44Proses'])->name('updateAgama44Proses');

    // user
    Route::get('/deleteUser44/{id}', [User44Controller::class, 'deleteUser44'])->name('deleteUser44');
    Route::get('/approveUser44/{id}', [User44Controller::class, 'approveUser44'])->name('approveUser44');
});

Route::get('/login44', [User44Controller::class, 'login44'])->name('login44');
Route::post('/loginProses44', [User44Controller::class, 'loginProses44'])->name('loginProses44');


Route::get('/register44', [User44Controller::class, 'register44'])->name('register44');
Route::post('/registerProses44', [User44Controller::class, 'registerProses44'])->name('registerProses44');


