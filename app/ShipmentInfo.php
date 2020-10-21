<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentInfo extends Model
{
    protected $fillable = [
        'order_id','ship_name','ship_phone','ship_email','ship_address'
    ];
}
