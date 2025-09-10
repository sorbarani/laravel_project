<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'price', 'created_at', 'producer'];

    protected $table = 'products';
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
}