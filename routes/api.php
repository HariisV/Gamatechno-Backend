<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/todo/{key}', [TodoController::class, 'get']);
Route::post('/todo-post', [TodoController::class, 'post']);
Route::post('/todo-update', [TodoController::class, 'update']);
Route::post('/todo-completed-all', [TodoController::class, 'completedall']);
Route::post('/todo-clear-completed', [TodoController::class, 'clearCompleted']);
Route::post('/todo-delete/{id}', [TodoController::class, 'delete']);


