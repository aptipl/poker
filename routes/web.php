<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';
Route::get('/', function () {
    return redirect('login');
});


// user Routes
Route::group([
    'prefix' => 'user',
    'middleware' => ['web', 'auth', 'is_customer', 'verified']
], function () {
    Route::get('/', [VoteController::class, 'index']);
    Route::get('/home', [VoteController::class, 'index'])->name('home');
    Route::get('/games/share/{code}', [GameController::class, 'voting'])->name('game-share');
    Route::post('/games/vote', [VoteController::class, 'store'])->name('game-vote');
});

// admin Routes
Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth', 'is_admin', 'verified']
], function () {
    Route::get('/', [GameController::class, 'index']);
    Route::get('/dashboard', [GameController::class, 'index']);
    Route::resource('/games', GameController::class);
    Route::resource('/users', UserController::class);
});
