<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $with = ['user'];

    protected $fillable = ['title', 'content', 'user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getCommentCountAttr() {
        return (int) $this->comments()->count();
    }
}
