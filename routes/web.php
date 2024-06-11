<?php

use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicsController;
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

Route::get('/', [PagesController::class, 'root'])->name('root')->middleware('verified');;

Auth::routes();

// Email 认证相关路由
Route::get('email/verify', [VerificationController::class,'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class,'resend'])->name('verification.resend');

Route::resource('users', UsersController::class, ['only' => ['show', 'update', 'edit']]);

Route::resource('topics', TopicsController::class, ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
