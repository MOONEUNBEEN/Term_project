<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nic', 'phone', 'zipcode', 'addr1', 'addr2', 'activated', 'confirm_code', 'notification',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'last_login', 'activated',
        'updated_at',
    ];

    protected $casts = [
        'activated' => 'boolean',                 
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function isAdmin() {
        return ($this->id === 20) ? true : false;
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
