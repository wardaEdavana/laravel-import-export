<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\categoryTestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [CategoryTestController::class,'index']);
Route::get('/{category_id}', [GamesController::class,'getBreadcrumbsTrail']);


