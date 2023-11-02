<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelNewsManagement extends Model
{
    use HasFactory;

    protected $table = 'news_management';

    protected $fillable = [
        'image',
        'title',
        'content',
        'status',
        'created_at',
        'updated_at'
    ];
}
