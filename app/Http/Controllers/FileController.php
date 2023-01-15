<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showCreateForm()
    {
        return view('files/create');
    }
    
    public function create(CreateFolder $request) //バリデーションの追加
    {
        // フォルダモデルのインスタンスを作成する
        $file = new File();
        // タイトルに入力値を代入する
        $file->title = $request->title;
        // インスタンスの状態をデータベースに書き込む
        $file->save();
    
        return redirect()->route('tasks.index', [
            'id' => $file->id,
        ]);
    }
}
