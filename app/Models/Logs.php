<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'subject',
        'query_request',
        'query_type',
        'transaction_id',
        'url',
        'method',
        'ip',
        'agent',
        'user_id'

    ];
}
