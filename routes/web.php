<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Roles
    Route::resource('roles', App\Http\Controllers\RolesController::class);
    // Permissions
    Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
});

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});



Route::middleware('auth')->prefix('users')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


// Route::fallback(function () {
//     return redirect('/');
// });
// Users 
Route::middleware('auth')->prefix('users')->name('users.')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
    Route::get('/import-useroperation', [UserController::class, 'importUserOprations'])->name('useroperation');
    Route::post('/upload-useroperation', [UserController::class, 'uploadUserOperations'])->name('upload_useroperation');
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [UserController::class, 'export'])->name('export');
});


Route::middleware('auth')->group(function () {
    // funds
    Route::resource('funds', FundController::class);
    Route::get('/funds/import', [FundController::class, 'importFundmanagment'])->name('fundmanagment');
    Route::post('/funds/store', [UserController::class, 'uploadFundmanagment'])->name('upload_fundmanagment');


    Route::get('/Report-create', [ReportController::class, 'create'])->name('reportcreate');
    Route::post('/Report-save', [ReportController::class, 'store'])->name('reportsave');
    Route::get('/requests', [ReportController::class, 'allrequests'])->name('allrequests');
});





Route::fallback(function () {
    return redirect()->route('login');
});
