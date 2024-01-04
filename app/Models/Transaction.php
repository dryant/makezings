<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews');
    }
    
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
