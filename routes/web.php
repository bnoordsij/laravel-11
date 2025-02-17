<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversation/{conversation?}', [ConversationController::class, 'form'])->name('conversations.form');
    Route::post('/conversation/{conversation?}', [ConversationController::class, 'save'])->name('conversations.save');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
