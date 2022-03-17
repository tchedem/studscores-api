<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'score',
        'student_matricule',
        'student_id',
        'matter_id',
        'teacher_id',
        'year',
        'comment',
        // 'level_id',
    ];

}
