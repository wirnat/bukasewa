<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {
    
    protected $table = 'properti_testimonials';

    protected $fillable = [
                            'id',
                            'id_properti',
                            'comment',
                            'rate',
                            'id_user',
                            'show',
                            'created_at',
                            'updated_at'
                            ];

    // public static $rules = array(); 
    
    public function rules()
    {
        return [
            'rate'         => 'nullable',
        ];
    }

    public static $messages = array(); 
    
    public function user()
    {
      return $this->belongsTo('App\Users','id_user','id');
    }

    public function product()
    {
      return $this->belongsTo('App\Properti','id','id_properti');
    }
}
