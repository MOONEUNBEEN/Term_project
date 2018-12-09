<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function articles() {
        return $this->belongsTo(Article::class);
    }

    public function products() {
        return $this->belongsTo(Product::class);
    }
}
