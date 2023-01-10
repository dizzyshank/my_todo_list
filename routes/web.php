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

/*フォルダ一覧画面のルーティングを記述する
1./foldersが全てのフォルダを表す
2.{フォルダID}により、フォルダを一意に特定
3.その特定のフォルダのタスクを表現するとtasks*/

//folders/{id}/tasksにアクセスが来たら、TaskControllerのindexアクションを呼び出す(ルート名：tasks.index)
Route::get('folders/{id}/tasks', 'TaskController@index')->name('tasks.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
