<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class Watermark extends Controller
{
    public function add($img,$path)
    {
        $img = Image::make($img);
        $wm= Image::make(public_path('/img/newlogo.png'));
        $wm->resize(100, 70);
        /* insert watermark at bottom-right corner with 10px offset */
        $img->insert($wm, 'bottom-right', 50, 10);
    
        $img->save(public_path($path)); 
    }
}
