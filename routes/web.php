<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');
Route::view('/grazie', 'thanks')->name('landing.thanks');
Route::post('/richiesta', [LeadController::class, 'store'])->name('leads.store');
