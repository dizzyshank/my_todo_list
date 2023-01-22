<?php

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

Route::get('/', function () {
    return view('welcome');
});

//使用するコントローラーの一覧を以下に記述
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware;


Route::middleware(['middleware' => 'auth'])->group(function () {
    //ホーム画面へのルーティング
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    
    //タスク関連に関するルーティング
    Route::get('folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('folders/{id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('folders/{id}/tasks/create', [TaskController::class, 'create']);
    Route::get('folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
    Route::post('folders/{id}/tasks/{task_id}/delete', [TaskController::class, 'delete'])->name('task.delete');
    
    //フォルダ関連に関するルーティング
    Route::get('folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('folders/create', [FolderController::class, 'create']);
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();


