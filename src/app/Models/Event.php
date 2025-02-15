<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'location',
        'group_id',
        'detail',
        'register_user_id',
    ];
}
