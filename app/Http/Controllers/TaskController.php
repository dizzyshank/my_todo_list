<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
}

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folder = Folder::all(); //全てのフォルダのデータをデータベースから取ってくる。
        
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
        ]);
    }
}