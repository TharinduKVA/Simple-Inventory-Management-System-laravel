<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);