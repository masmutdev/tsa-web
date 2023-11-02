<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUpcomingEvents extends Model
{
    use HasFactory;

    protected $table = 'upcoming_events';

    protected $fillable = [
        'image',
        'title',
        'content',
        'start_date',
        'end_date',
        'status',
        'created_at',
        'updated_at',
    ];
}
