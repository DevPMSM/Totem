<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'queue_name',
        'ticket_number',
        'is_preferential',
        'service_id',
        'service_name',
        'status'
    ];
}
