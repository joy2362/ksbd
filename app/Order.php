<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'userId','name','email','phone','amount','address','status','transaction_id','currency','card_type','store_amount','order_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','userId');
    }

    public function shipment()
    {
        return $this->belongsTo('App\ShipmentInfo','transaction_id','order_id');
    }
}
