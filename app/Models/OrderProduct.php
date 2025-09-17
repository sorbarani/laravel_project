<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'sub_product',
        'offer_id',
        'offer_id_value',
        'offer_on_product',
        'price',
        'quantity ',
        'subtotal '	,
        'created_at', 
        'updated_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
