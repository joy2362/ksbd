<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteDetails extends Model
{
    protected $fillable = [
        'site_name', 'address','about', 'logo','phone_1','phone_2', 'email','facebook_link','google_link','instagram_link'
    ];
}
