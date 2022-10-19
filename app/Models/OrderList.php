<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_price', 'order_code', 'address', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}