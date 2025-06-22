<?php

namespace packages\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'location',
        'group_id',
        'detail',
        'register_user_id',
    ];

    protected $dates = ['deleted_at'];
}
