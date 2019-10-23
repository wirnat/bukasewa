<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Home extends Controller
{
    
    protected $kategori;

    public function __construct()
    {
        $this->kategori=DB::table('kategori')->get();
    }

    public function index(Request $r)
    {
        $data['banner']="fill";
        $data['kategori']=$this->kategori;
        $data['region']=$data['region']=DB::table('region')->select("region.*",DB::raw("(select count(properti.id_properti) from properti where region.id=properti.region) as jumlah"))->leftJoin("properti","properti.region","=","region.id")->groupBy("region.id")->get();
        $data['message']=Session::get('message');
        print_r(csrf_token());
        return view("customer.home",$data);
    }

    public function api_rekomen(Request $r)
    {
        $properti=DB::table('properti')->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->leftJoin("users","properti.id_user","=","users.id")->
        select("users.name as pemilik","paket","properti.*","properti_img.link","properti_img.tipe",DB::raw("
        111.111 *
            DEGREES(ACOS(LEAST(COS(RADIANS(lat))
                * COS(RADIANS(".$r->lat."))
                * COS(RADIANS(lng - ".$r->lng."))
                + SIN(RADIANS(lat))
                * SIN(RADIANS(".$r->lat.")), 1.0))) AS distance"))->where("paket","!=","0A")->groupBy("users.id")->orderBy("users.paket","desc")->where("aktif","aktif");
        return response()->json($properti->take('10')->get()); 
    }
}

