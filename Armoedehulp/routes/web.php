<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ExpertsController;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\ReactiesController;
use App\Http\Controllers\WerknemersController;
use App\Http\Controllers\ArtikelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ForumsController::class, 'home'])->name('home');

Route::resource('chats', ChatController::class)->only(['index', 'create', 'show', 'store']);

Route::resource('experts', ExpertsController::class);

Route::resource('forums', ForumsController::class);

Route::resource('reacties', ReactiesController::class)->parameters(['reacties' => 'reactie'])->only(['create', 'store', 'update']);

Route::resource('werknemers', WerknemersController::class);

Route::resource('artikelen', ArtikelController::class)->parameters(['artikelen' => 'artikel'])->only(['index', 'create', 'show', 'store']);