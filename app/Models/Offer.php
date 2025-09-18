<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'id', 
        'name',
        'value',
        'base_price', 
        'start_at',
        'end_at',
        'percent',
        'count',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
