<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function booksBorrowed()
    {
        return $this->hasMany(Borrow::class, 'book_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
