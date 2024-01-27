<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['maker_id', 'customer_id', 'price', 'customer_id'];
    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews');
    }
    
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function maker()
    {
        return $this->belongsTo('App\Models\User', 'maker_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }
}
