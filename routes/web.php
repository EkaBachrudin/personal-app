<?php

use App\Http\Controllers\Personal\PersonalNoteController;
use App\Http\Controllers\Work\InstantTaskController;
use App\Http\Controllers\Work\NoteWorkController;
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

    //==========================personal=====================================
    Route::get('/personal/note/index', [PersonalNoteController::class, 'index']);


    //==========================WORK=========================================
    Route::get('/task/index', [TaskController::class, 'index']);
    Route::post('/task/index/create', [TaskController::class, 'create']);
    Route::get('/task/index/getData/{id}', [TaskController::class, 'getData']);
    Route::post('/task/index/update/{id}', [TaskController::class, 'update']);
    Route::post('/task/index/completed/{id}', [TaskController::class, 'completed']);
    Route::post('/task/index/remove/{id}', [TaskController::class, 'delete']);
    Route::get('/task/task-history', [TaskController::class, 'taskHistory']);
    Route::post('/task/task-history', [TaskController::class, 'taskHistory']);
    Route::get('/task/task-history/restored/{id}', [TaskController::class, 'restoreHistory']);

    Route::get('/instant/index', [InstantTaskController::class, 'index']);
    Route::POST('/instant/index', [InstantTaskController::class, 'create']);
    Route::get('/instant/history', [InstantTaskController::class, 'history']);
    Route::get('/instant/history/getData/{id}', [InstantTaskController::class, 'getData']);
    Route::delete('/instant/history/delete/{id}', [InstantTaskController::class, 'deleteInstantHistory']);
    Route::put('/instant/history/update/{id}', [InstantTaskController::class, 'update']);

    Route::get('/note/index', [NoteWorkController::class, 'index']);
    Route::get('/note/index/create', [NoteWorkController::class, 'create']);
    Route::get('/note/detail/{id}', [NoteWorkController::class, 'detail']);
    Route::get('/note/detail/getData/{id}', [NoteWorkController::class, 'getData']);
    Route::post('/note/detail/update/{id}', [NoteWorkController::class, 'update']);
});

require __DIR__.'/auth.php';
