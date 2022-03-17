<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matter;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'last_name',
        'first_name',
        'gender',
        'email',
        'phone_number',
        'valid',
        'description',
        'user_id',
    ];

    public function matters()
    {
        return $this->hasMany(Matter::class);
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
