<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('frontend.index');
})->name('frontend');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile',  'profile')->name('profile');
        Route::put('/profile/update',  'update')->name('profile.update');
        Route::put('/change-password', 'changePassword')->name('changePassword');
    });

    Route::prefix('/categories')->controller(CategoryController::class)->name('category.')->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','delete')->name('delete');
    });


});
