<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('ValentinesApp');
})->name('home');

Route::post('/send-love-letter', [\App\Http\Controllers\LoveLetterController::class, 'send'])->name('love-letter.send');
