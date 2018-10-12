<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title'];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
