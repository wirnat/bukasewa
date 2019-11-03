<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Properti extends Model {
    protected $table = 'properti';

    protected $fillable = [
                            'id_properti',
                            'status ',
                            'properti',
                            'id_user',
                            'lat',
                            'lng',
                            'alamat',
                            'kategori',
                            'kamar',
                            'toilet',
                            'toilet',
                            'garasi',
                            'balkon',
                            'tv',
                            'diupdate_pada',
                            'deskripsi',
                            'aktif',
                            'harga',
                            'luasruangan',
                            'whatsapp',
                            'region',
                            'dibuat_pada'
                            ];

    public static $rules = array();

    public static $messages = array(); 
    
    public function user()
    {
      return $this->hasMany('App\Users', 'id','id_user');
    }

    public function testimonial()
    {
      return $this->hasMany('App\Testimonial', 'id_user','id');
    }
}
