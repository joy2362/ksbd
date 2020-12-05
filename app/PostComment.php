<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'post_id','user_id','comment'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
