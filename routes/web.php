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


use App\Http\Controllers\TaskController;
/*フォルダ一覧画面のルーティングを記述する
1./foldersが全てのフォルダを表す
2.{フォルダID}により、フォルダを一意に特定
3.その特定のフォルダのタスクを表現するとtasks*/

//folders/{id}/tasksにアクセスが来たら、TaskControllerのindexアクションを呼び出す(ルート名：tasks.index)
Route::get('folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('folders/{id}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
Route::post('folders/{id}/tasks/create', [TaskController::class, 'create']);
Route::get('folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
Route::post('folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
Route::post('folders/{id}/tasks/{task_id}/delete', [TaskController::class, 'delete'])->name('task.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\FolderController;

Route::get('folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
Route::post('folders/create', [FolderController::class, 'create']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\FileController;

Route::get('files/create', [FileController::class, 'showCreateForm'])->name('files.create');
Route::post('files/create', [FileController::class, 'create']);
