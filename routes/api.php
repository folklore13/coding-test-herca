<?php

use App\Http\Controllers\PerhitunganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/perhitungan', PerhitunganController::class);
