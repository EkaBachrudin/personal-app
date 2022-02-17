<?php

use App\Http\Controllers\Work\TaskController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    //==========================WORK=========================================
    Route::get('/task/index', [TaskController::class, 'index']);
    Route::post('/task/index/create', [TaskController::class, 'create']);
    Route::get('/task/index/getData/{id}', [TaskController::class, 'getData']);
    Route::post('/task/index/update/{id}', [TaskController::class, 'update']);
    Route::post('/task/index/completed/{id}', [TaskController::class, 'completed']);
    Route::get('/task/task-history', [TaskController::class, 'taskHistory']);
    Route::post('/task/task-history', [TaskController::class, 'taskHistory']);
});

require __DIR__.'/auth.php';
