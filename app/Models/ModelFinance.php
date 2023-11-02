<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFinance extends Model
{
    use HasFactory;
    protected $table = 'finance';

    protected $fillable = [
        'needs_income',
        'price_income',
        'needs_price',
        'price_price',
        'description'
    ];
}
