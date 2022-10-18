<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'qty', 'total_price', 'order_code', 'address'];

    public function book()
    {
        return $this->belongsTo('App\Models\book');
    }
}