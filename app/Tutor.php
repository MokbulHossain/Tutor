<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Tutor extends Authenticatable
{
       use Notifiable;

    protected $guard = 'tutor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

     protected function offer_subjects(){
        return $this->hasMany(Qualififation::class);
    }
    protected function avilabilities(){
        return $this->hasMany(Avilabilitie::class);
    }
    
     protected function hires(){
        return $this->hasMany(Hire::class);
    }
    
     protected function academic_qualification(){
        return $this->hasMany(Academic_qualification::class);
    }
}
