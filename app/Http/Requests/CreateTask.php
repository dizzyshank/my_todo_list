<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:today',
        ];
    }
    
      public function attributes()
    {
        return [
            'title' => 'タイトル',
            'start_date' => '開始日',
            'end_date' => '終了日',
        ];
    }

    public function messages()
    {
        return [
            'start_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
            'end_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
