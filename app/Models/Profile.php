<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'postal_code', 'postal_code');
    }

}
