<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $fillable = [
                            'id',
                            'name', 
                            'email', 
                            'img',
                            'alamat',
                            'tipeakun',
                            'phone',
                            'created_at',
                            'updated_at',
                            'paket'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function testimonial()
    {
      return $this->hasMany('App\Testimonial', 'id','id_user');
    }
}
