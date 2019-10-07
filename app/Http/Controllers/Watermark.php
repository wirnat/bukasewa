<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class Watermark extends Controller
{
    public function add($img,$path)
    {
        $img = Image::make($img);
   
        /* insert watermark at bottom-right corner with 10px offset */
        $img->insert(public_path('/img/wm.png'), 'center', 10, 10);
    
        $img->save(public_path($path)); 
    }
}
