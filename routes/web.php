<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('php', function () {
    echo phpinfo();
});
Route::get('notifcations/benefit', [App\Http\Controllers\NotificationController::class, 'benefit'])->name('notifications.benefit');
Route::get('notifcations/daysoff', [App\Http\Controllers\NotificationController::class, 'daysoff'])->name('notifications.daysoff');
Route::get('notifcations/fullyear', [App\Http\Controllers\NotificationController::class, 'fullyear'])->name('notifications.fullyear');
Route::get('notifcations/birthday', [App\Http\Controllers\NotificationController::class, 'birthday'])->name('notifications.birthday');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('users/create', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::post('users/remove/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
Route::get('statics/totalearnings', [App\Http\Controllers\StaticController::class, 'totalearnings'])->name('statics.totalearnings');
Route::get('statics/vacationdays', [App\Http\Controllers\StaticController::class, 'vacationdays'])->name('statics.vacationdays');
Route::get('statics/averagebenefits', [App\Http\Controllers\StaticController::class, 'averagebenefits'])->name('statics.averagebenefits');
