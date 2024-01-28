<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=['transaction_id', 'user_id', 'review', 'comment', 'delivery_time', 'print_quality', 'price', 'customer_id'];

    public function transaction(){
        return $this->belongsTo('App\Models\Transaction');
    }
}
