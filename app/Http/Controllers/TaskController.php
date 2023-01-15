<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all(); //全てのフォルダのデータを取得
        
        $current_folder = Folder::find($id); // 選ばれたフォルダを取得する
        
        $tasks = $current_folder->tasks()->get();
        
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }
        
        /**
     * GET /folders/{id}/tasks/create
     */
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }
    
    public function create(int $id, CreateTask $request)
    {
    $current_folder = Folder::find($id);

    $task = new Task();
    $task->title = $request->title;
    $task->start_date = $request->start_date;
    $task->end_date = $request->end_date;

    $current_folder->tasks()->save($task);

    return redirect()->route('tasks.index', [
        'id' => $current_folder->id,
    ]);
    }
    
        /**
     * GET /folders/{id}/tasks/{task_id}/edit
     */
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);
    
        return view('tasks/edit', [
            'task' => $task,
    ]);
    }
    
    public function edit(int $id, int $task_id, EditTask $request)
    {
    // 1
    $task = Task::find($task_id);

    // 2
    $task->title = $request->title;
    $task->status = $request->status;
    $task->start_date = $request->start_date;
    $task->end_date = $request->end_date;
    $task->save();

    // 3
    return redirect()->route('tasks.index', [
        'id' => $task->folder_id,
    ]);
    }
    
     /**
     * 削除処理
     */
    public function delete($task_id)
    {
        // tasksテーブルから指定のIDのレコード1件を取得
        $task = Task::find($task_id);
        // レコードを削除
        $task->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('tasks.index');
    }
}