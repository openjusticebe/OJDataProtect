<?php

use App\Http\Controllers\HomeController;
  
Route::get('dashboard', [HomeController::class, 'dashboard'])
->name('dashboard');
