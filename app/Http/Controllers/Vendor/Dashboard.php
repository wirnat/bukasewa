<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    public function index()
    {
        $data['me']=auth()->user();
        $data['properti']=DB::table('properti')->rightJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->where("id_user",auth()->user()->id)->where("tipe","img")->groupBy("properti.id_properti")->get();
        return view("vendors.dashboard",$data);
    }
}
