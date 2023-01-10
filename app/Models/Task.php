<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger'],
        2 => [ 'label' => '着手中', 'class' => 'label-info'  ],
        3 => [ 'label' => '完了', 'class' => '' ], //状態定義
    ];

    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        } // 定義されていなければ空文字を返す

        return self::STATUS[$status]['class'];
    }
    
    public function getFormattedStartDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['start_date'])
            ->format('Y/m/d');
    }
    
    public function getFormattedEndDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['end_date'])
            ->format('Y/m/d');
    }
    use HasFactory;
}
