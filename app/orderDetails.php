<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
      protected $fillable = [
        'userId','product_id','quantity','singleprice','totalprice','trans_id'
      ];
    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

}
