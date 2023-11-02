<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFilesManager extends Model
{
    use HasFactory;
    protected $table = 'files_manager';
    protected $fillable = [
      'user_id',
      'file_name',
      'file_description',
      'file_data',
      'format',
      'status',
      'visibility',
  ];
}
