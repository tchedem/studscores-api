<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'maticule',
        'last_name',
        'first_name',
        'gender',
        'email',
        'phone_number',
        'valid',
        'description',
        'role',
        // 'institute_or_facultie_id',
        // 'promotion_id',
        // 'level_id',
    ];

}
