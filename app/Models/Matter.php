<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Matter extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'name',
        'academic_manager_id',
        'teacher_id',
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

}
