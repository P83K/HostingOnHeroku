<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthManager;

Route::view('/', 'welcome');

Route::get('/login',[AuthManager::class, 'login'])->name('login');

Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration',[AuthManager::class, 'registration'])->name('registration');

Route::post('/registration',[AuthManager::class, 'registrationPost'])->name('registration.post');

Route::resource('events', EventController::class);

Route::get('/events.index',[EventController::class, 'index'])->name('home');

Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');

Route::get('/changePassword',[AuthManager::class, 'changePassword'])->name('changePassword');

Route::post('/changePassword',[AuthManager::class, 'update'])->name('changePassword.post');

Route::get('/print', [EventController::class, 'print'])->name('print');