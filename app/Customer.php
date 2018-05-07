<?php

namespace Noblex;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Noblex\Category;
use Noblex\Notifications\ResetPasswordNotification;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_customer');
    }

    /*public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }*/
}
