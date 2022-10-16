<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TagihanUser;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReportController;

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

Route::get('/', [WelcomeController::class, 'block'])->name('block');
Route::get('aturan', [WelcomeController::class, 'aturan'])->name('aturan');
Route::get('/block/{id}', [WelcomeController::class, 'index'])->name('index');
Route::get('/show/{id}', [WelcomeController::class, 'show'])->name('show');
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
   Auth::routes(['register'=>false, 'reset'=>false]); 
});

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function () {
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('show-User',[AdminController::class,'showUser'])->name('showUser');
    Route::get('print-User',[AdminController::class,'printUser'])->name('printUser');
    Route::get('add-User',[AdminController::class,'addUser'])->name('addUser');
    Route::post('add-User-Store',[AdminController::class,'addUserStore'])->name('addUser.store');
    Route::post('edit-User-Store/{id}',[AdminController::class,'UpdateUserStore'])->name('update.store');
    Route::get('edit-User/{id}',[AdminController::class, 'edit'])->name('pelanggan.edit');

    // Layanan
    Route::resource('layanan', LayananController::class);
    Route::resource('block', BlockController::class);
    // Tagihan
    Route::get('tagihan/create/{id}', [TagihanController::class,'create'])->name('tagihan.create');
    Route::get('tagihan/list',[TagihanController::class,'list'])->name('tagihan.list');
    Route::post('tagihan/store', [TagihanController::class,'store'])->name('tagihan.store');
    Route::get('tagihan/{id}', [TagihanController::class, 'index'])->name('tagihan.index');
    Route::get('tagihan/edit/{id}',[TagihanController::class, 'edit'])->name('tagihan.edit');
    Route::post('tagihan/update/{id}',[TagihanController::class, 'update'])->name('tagihan.update');
    Route::get('tagihan/denda/{id}',[TagihanController::class, 'denda'])->name('tagihan.denda');
    // khusus page tunggakan
    Route::get('allTunggakan', [TagihanController::class, 'tunggakan'])->name('tunggakan');
    Route::get('all-tunggakan-print', [TagihanController::class, 'printTunggakan'])->name('printTunggakan');

    // super Admin
    Route::get('super-admin', [AdminController::class, 'superAdmin'])->name('superAdmin');
    Route::post('super-admin/{id}', [AdminController::class, 'delete'])->name('delete');

    // Report
    Route::get('report', [ReportController::class, 'index'])->name('report');
});
 
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function () {
    Route::get('/',[UserController::class, 'index'])->name('user.dashboard');
    Route::resource('tagihan-user', TagihanUser::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
