<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'start_time',
        'end_time',
        'actual_working_time'
    ];

    protected  $dates = [
        'start_time',
        'end_time',
        ];

    public function breaks()
    {
        return $this->hasMany(Breaktime::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

