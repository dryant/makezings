<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Zing extends Model
{
    use HasFactory;

    public function maker(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relacion polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
