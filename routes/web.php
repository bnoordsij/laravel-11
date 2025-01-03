<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserUploadController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (Router $router) {
    $router->get('/users/{user}', [UserController::class, 'form'])->name('users.form');
    $router->put('/users/{user}', [UserController::class, 'save'])->name('users.update');

    $router->get('/users/{user}/upload', [UserUploadController::class, 'upload'])->name('user-upload.upload');
    $router->put('/users/{user}/upload', [UserUploadController::class, 'save'])->name('user-upload.update');
    $router->get('/files/{media}', [UserUploadController::class, 'deleteFile'])->name('files.destroy');
});
