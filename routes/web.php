<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/', [QueueController::class, 'index'])->name('index');
Route::post('/generate-ticket', [QueueController::class, 'generateTicket'])->name('generate.ticket');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/attendant', [QueueController::class, 'attendantView'])->name('attendant');
    Route::post('/call-next', [QueueController::class, 'callNext'])->name('call.next');
    Route::get('/current-ticket', [QueueController::class, 'getCurrentTicket'])->name('current.ticket');
});
