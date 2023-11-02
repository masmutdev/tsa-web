<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEventCalendar extends Model
{
    use HasFactory;

    protected $table = 'event_calendar';

    protected $fillable = [
        'event_name',
        'start_date',
        'end_date',
    ];
}
