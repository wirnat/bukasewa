<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    public function index()
    {
        $data['me']=DB::table('users')->join("paket","paket.id_paket","=","users.paket")->select("users.*","nama_paket",DB::raw('(select count(*) from properti where properti.id_user=users.id and aktif="aktif") as jumlah_paket'))->where("users.id",auth()->user()->id)->first();
        $data['properti']=DB::table('properti')->rightJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->where("id_user",auth()->user()->id)->where("tipe","img")->groupBy("properti.id_properti")->get();

        return view("vendors.dashboard",$data);
    }
}
