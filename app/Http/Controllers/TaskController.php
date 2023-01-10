<?php

namespace App\Http\Controllers;
use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
}

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folder = Folder::all(); //全てのフォルダのデータを取得
        
        $current_folder = Folder::find($id); // 選ばれたフォルダを取得する
        
        $tasks = $current_folder->tasks()->get();
        
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
        ]);
    }
}