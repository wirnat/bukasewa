<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Pelanggan extends Model implements Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;
    public $table="pelanggan";
    protected $fillable = [
        'nama', 'id_pelanggan', 'email','provider'
    ];
}