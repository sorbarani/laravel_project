<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
	use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
    	'status',
        'total_amount',
    	'delivery_amount',
    	'delivery_option_id',
    	'offer_amount',
    	'paying_amount',
     	'payment_status',
    	'address_id',
    	'shipment_code',
    	'order_type' ,
        'description', 
    	'slug',
	];

	public function items()
	{
		return $this->hasmany(OrderProduct::class, 'order_id');
	}
}
