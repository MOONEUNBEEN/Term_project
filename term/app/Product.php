<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $with = ['user'];

    protected $fillable = ['name', 'price','content','user_id','hits'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function attechments() {
        return $this->hasMany(Attachment::class);
    }

    public static $rules = [
        /* 'id' => 'required',
        'price' => 'required',
        'content' => 'required', */
        'hits' => 'required',
    ];
}
