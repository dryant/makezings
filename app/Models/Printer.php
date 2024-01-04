<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    public function makers(){
        return $this->belongsToMany('App\Models\User', 'user_id');
    }
}
