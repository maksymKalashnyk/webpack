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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('homeAdmin');

        Route::resource('member', \App\Http\Controllers\Admin\MemberController::class, [
            'parameters' => ['member' => 'members']
        ]);
        Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class, [
            'parameters' => ['profile' => 'profiles']
        ]);
    });
});

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');