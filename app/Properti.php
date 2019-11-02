<<<<<<< HEAD
<?php namespace App;
=======
<?php
namespace App;
>>>>>>> 51cd479ee3e3f3f7ecb4307c34ca42d0aea9f893

use Illuminate\Database\Eloquent\Model;

class Properti extends Model {
<<<<<<< HEAD

	public $table="properti";

=======
    
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
>>>>>>> 51cd479ee3e3f3f7ecb4307c34ca42d0aea9f893
}
