<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'summary', 'price', 'photo', 'pdf', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}