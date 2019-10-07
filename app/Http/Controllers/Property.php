<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Property extends Controller
{
    protected $kategori;
    public function __construct()
    {
        $this->kategori=DB::table('kategori')->get();
    }
    public function list()
    {
        $data['properti']=DB::table('properti')->select("users.name as pemilik","kategori.kategori as kat","properti.*","properti_img.link")->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->orderBy("diupdate_pada","desc")->leftJoin("users","users.id","=","properti.id_user")->groupBy("id_properti")->join("kategori","kategori.id","=","properti.kategori")->where("aktif","aktif")->get();
        $data['kategori']=$this->kategori;
        $data['title']="Semua Hunian";
        return view("customer.list_hunian",$data);
    }
    public function regionlist($id_region)
    {
        $data['properti']=DB::table('properti')->select("users.name as pemilik","kategori.kategori as kat","properti.*","properti_img.link")->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->orderBy("diupdate_pada","desc")->leftJoin("users","users.id","=","properti.id_user")->join("kategori","kategori.id","=","properti.kategori")
        ->where("properti.region",$id_region)->groupBy("id_properti")->where("aktif","aktif")->get();
        $data['region']=DB::table('region')->select("region.*",DB::raw("(select count(properti.id_properti) from properti where region.id=properti.region) as jumlah"))->leftJoin("properti","properti.region","=","region.id")->where("region.id",$id_region)->first();
        $data['kategori']=$this->kategori;
        $data['pencarian']=count($data['properti'])." Hunian murah daerah ".$data['region']->provinsi;
        $data['title']=$data['region']->provinsi;
        // print_r();
        return view("customer.list_hunian",$data);
    }

    public function find(Request $r)
    {
        //prepare data
        if (empty($r->lat)||empty($r->lng)) {
            return redirect()->back()->with("message","Maaf, terjadi kesalahan pada fitur geolokasi.")->with("message-tiny","Silahkan coba lagi");
        }
        $properti=DB::table('properti')->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->rightJoin("users","users.id","=","properti.id_user")->leftJoin("sewa","sewa.id_property","=","properti.id_properti")->
        select("users.name as pemilik","properti.*","properti_img.link","properti_img.tipe",DB::raw("
        111.111 *
            DEGREES(ACOS(LEAST(COS(RADIANS(lat))
                * COS(RADIANS(".$r->lat."))
                * COS(RADIANS(lng - ".$r->lng."))
                + SIN(RADIANS(lat))
                * SIN(RADIANS(".$r->lat.")), 1.0))) AS distance"));

        if (empty($r->radius)) {
            $properti=$properti->having("distance","<","30");
        }elseif(!empty($r->radius)){
            $properti=$properti->having("distance","<",$r->radius);
        }if (!empty($r->status)) {
            $properti=$properti->where("status",$r->status);
        }if (!empty($r->toilet)) {
            $properti=$properti->where("toilet",">=",$r->toilet);
        }if (!empty($r->kamar)) {
            $properti=$properti->where("kamar",">=",$r->kamar);
        }if ($r->jarak=="show") {
            $data['jarak']="show";
            $properti=$properti->orderBy("distance","ASC");
        }
        if($r->durasi!=""){
            $data["rangeharga"]="Harga mulai dari ".$r->vmin." hingga ".$r->vmax."";
            $min=str_replace(".","",$r->vmin);
            preg_match_all('!\d+!', $min, $vmin);
            
            $max=str_replace(".","",$r->vmax);
            preg_match_all('!\d+!', $max, $vmax);
            
            $properti=$properti->where("sewa.durasi",$r->durasi)->whereRaw("digits(sewa.harga) >= ".implode(" ",$vmin[0])."")->whereRaw("digits(sewa.harga) <=".implode(" ",$vmax[0])."");
        }else{
            $data["rangeharga"]="";
        }
        if(!empty($r->order)){
            switch($r->order){
                case 'distance':$properti=$properti->orderBy("distance","ASC");
                break;
                case 'terbaru':$properti=$properti->orderBy("dibuat_pada","ASC");
                break;
                case 'termurah':$properti=$properti->orderByRaw('(digits(sewa.harga)) desc');
                break;
            }
        }
        
        
        // print_r(implode(" ",$vmax[0]));
        $kategori=DB::table('kategori')->where("id",$r->kategori)->first()->kategori;
        $data['properti']=$properti->orderBy("distance","ASC")->where("aktif",'aktif')->where("kategori",$r->kategori)->where("tipe","img")->groupBy("id_properti")->get();
        $data['kategori']=$this->kategori;
        $data['sewa']=DB::table('sewa')->get();
        $shortlokasi=explode(",", $r->lokasi);
        $data['pencarian']=count($data['properti'])." ".$kategori." di ".$shortlokasi[0].",".$shortlokasi[1];
        //tampilkan view
        return view("customer.find",$data);
    }
    public function api_detailproperti(Request $r)
    {
        $data['properti']=DB::table('properti')->where('id_properti',$r->id)->first();
        $data['fitur']=DB::table('properti_fitur')->join("fitur","fitur.id_fitur","=","properti_fitur.id_fitur")->where('id_properti',$r->id)->get();
        $data['img']=DB::table('properti_img')->where('id_properti',$r->id)->get();
        if ($data['properti']->status=='sewa') {
            $data['harga']=DB::table('sewa')->where('id_property',$r->id)->get();
        } else {
            $data['harga']=DB::table('beli')->where('id_property',$r->id)->get();
        }
        
        return response()->json($data);
    }
    public function api_magnify(Request $r)
    {
        $data=DB::table('properti_img')->where("id_properti",$r->id)->where("tipe","img")->get();
        return response()->json($data);
    }
    public function detail($id)
    {
        $data['properti']=DB::table('properti')->where('id_properti',$id)->first();
        $data['fitur']=DB::table('properti_fitur')->join("fitur","fitur.id_fitur","=","properti_fitur.id_fitur")->where('id_properti',$id)->get();
        $data['img']=DB::table('properti_img')->where('id_properti',$id)->where("tipe","img")->get();
        $data['harga']=DB::table('sewa')->where('id_property',$id)->get();
        $data['vendor']=DB::table('users')->where("tipeakun","vendor")->where("id",$data['properti']->id_user)->first();
        $data['video']=DB::table('properti_img')->where('id_properti',$id)->where('tipe','video')->get();
        $data['kategori']=$this->kategori;
        $data['search']="false";
        $data['message']=Session::get('message');
        $data['status']=Session::get('status');
        // print_r($data['vendor']);
        return view('customer.detailproperti',$data);
    }
    
}
