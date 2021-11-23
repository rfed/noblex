<?php

namespace Noblex;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Noblex\Category;
use Noblex\Notifications\CustomerResetPasswordNotification;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';
    protected $dates = ['birth'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname' ,'email', 'password', 'gender', 'birth',
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


    public function getGenderAttribute()
    {
        if($this->attributes['gender'] == 'M')
            return $this->attributes['gender'] = 'M';
        else
            return $this->attributes['gender'] = 'F';
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }
}
