<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;

Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/inzendingen', [MessageController::class, 'index'])->name('messages.index');
Route::patch('/messages/{message}/read', [MessageController::class, 'markRead'])->name('messages.read');
