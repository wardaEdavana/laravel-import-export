<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\categoryTestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ExportCOntroller::class,'getFileContents']);
// Route::get('/{category_id}', [GamesController::class,'getBreadcrumbsTrail']);


