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
        $data['rekomen']=DB::table('properti')->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->leftJoin("users","users.id","=","properti.id_user")->
        select("users.name as pemilik","properti.*","properti_img.link","properti_img.tipe")->groupBy("properti.id_properti")->orderBy("properti.paket","desc")->where("aktif","aktif")->where("paket","!=","0A")->get();
        return view("customer.home",$data);
    }

    public function api_rekomen(Request $r)
    {
        $properti=DB::table('properti')->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->leftJoin("users","users.id","=","properti.id_user")->
        select("users.name as pemilik","properti.*","properti_img.link","properti_img.tipe",DB::raw("
        111.111 *
            DEGREES(ACOS(LEAST(COS(RADIANS(lat))
                * COS(RADIANS(".$r->lat."))
                * COS(RADIANS(lng - ".$r->lng."))
                + SIN(RADIANS(lat))
                * SIN(RADIANS(".$r->lat.")), 1.0))) AS distance"))->groupBy("properti.id_properti")->orderBy("properti.paket","desc")->where("aktif","aktif")->where("paket","!=","0A");
        return response()->json($properti->where("paket","!=","0A")->take("10")->get()); 
    }
}
