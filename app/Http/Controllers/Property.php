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
        $data['properti']=DB::table('properti')->select("users.name as pemilik","kategori.kategori as kat","properti.*","properti_img.link")->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->orderBy("dibuat_pada","desc")->leftJoin("users","users.id","=","properti.id_user")->groupBy("id_properti")->join("kategori","kategori.id","=","properti.kategori")->where("aktif","aktif")->get();
        $data['kategori']=$this->kategori;
        $data['title']="Semua Hunian";
        return view("customer.list_hunian",$data);
    }
    public function regionlist($prov)
    {
        $data['properti']=DB::table('properti')->select("users.name as pemilik","kategori.kategori as kat","properti.*","properti_img.link","region.provinsi")->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->orderBy("dibuat_pada","desc")->
        leftJoin('region',"region.id","=","properti.region")->
        leftJoin("users","users.id","=","properti.id_user")->join("kategori","kategori.id","=","properti.kategori")
        ->where("region.provinsi",$prov)->groupBy("id_properti")->where("aktif","aktif")->get();
        $data['region']=DB::table('region')->select("region.*",DB::raw("(select count(properti.id_properti) from properti where region.id=properti.region) as jumlah"))->leftJoin("properti","properti.region","=","region.id")->where("region.provinsi",$prov)->first();
        $data['kategori']=$this->kategori;
        $data['pencarian']=count($data['properti'])." Hunian murah daerah ".$data['region']->provinsi;
        $data['title']=$data['region']->provinsi;
        // print_r();
        return view("customer.list_hunian",$data);
    }

    public function around($tempat)
    {
        $data_tempat=DB::table('tempat')->where("nama",$tempat)->first();

        $data['properti']=DB::table('properti')->select("users.name as pemilik","kategori.kategori as kat","properti.*","properti_img.link","region.provinsi",
        DB::raw("
        111.111 *
            DEGREES(ACOS(LEAST(COS(RADIANS(properti.lat))
                * COS(RADIANS(".$data_tempat->latitude."))
                * COS(RADIANS(properti.lng - ".$data_tempat->longitude."))
                + SIN(RADIANS(properti.lat))
                * SIN(RADIANS(".$data_tempat->latitude.")), 1.0))) AS distance"))->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->orderBy("distance","asc")->
        leftJoin('region',"region.id","=","properti.region")->
        leftJoin("users","users.id","=","properti.id_user")->join("kategori","kategori.id","=","properti.kategori")
        ->having("distance","<","5")->groupBy("id_properti")->where("aktif","aktif")->get();
        $data['kategori']=$this->kategori;
        $data['tag']=$data_tempat->tag;
        $data['jarak']="show";
        $data['pencarian']=count($data['properti'])." Hunian disekitar $data_tempat->tag ".$tempat;
        $data['title']="Hunian disekitar ";
        // print_r();

        return view("customer.list_hunian",$data);
    }

    public function district($tempat)
    {
        $data_tempat=DB::table('tempat')->leftJoin("region","region.id","tempat.provinsi")->select("tempat.*","region.provinsi as prov_name")->where("tempat.nama",$tempat)->first();

        $data['properti']=DB::table('properti')->select("users.name as pemilik","kategori.kategori as kat","properti.*","properti_img.link","region.provinsi",
        DB::raw("
        111.111 *
            DEGREES(ACOS(LEAST(COS(RADIANS(properti.lat))
                * COS(RADIANS(".$data_tempat->latitude."))
                * COS(RADIANS(properti.lng - ".$data_tempat->longitude."))
                + SIN(RADIANS(properti.lat))
                * SIN(RADIANS(".$data_tempat->latitude.")), 1.0))) AS distance"))->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->orderBy("distance","asc")->
        leftJoin('region',"region.id","=","properti.region")->
        leftJoin("users","users.id","=","properti.id_user")->join("kategori","kategori.id","=","properti.kategori")
        ->having("distance","<","105")->groupBy("id_properti")->where("aktif","aktif")->where("properti.alamat",'like','%'.$tempat.', '.$data_tempat->prov_name.'%')->get();
        $data['kategori']=$this->kategori;
        $data['tag']=$data_tempat->tag;
        $data['pencarian']=count($data['properti'])." Hunian di $data_tempat->tag ".$tempat;
        $data['title']="Hunian disekitar ";
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
        }if (!empty($r->kamar)) {
            $properti=$properti->where("kamar",">=",$r->kamar);
        }if ($r->jarak=="show") {
            $data['jarak']="show";
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
            $data['hargajual']=$data['properti']->harga;
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
        $data['properti']=DB::table('properti')->leftJoin('region','region.id',"=","properti.region")->where('properti.id_properti',$id)->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->where('properti_img.tipe',"img")->first();
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

    public function cariSekitar(Request $r)
    {
        $tempat=DB::table('tempat')->where("id",$r->id)->first();
        $lat=$tempat->latitude;
        $lng=$tempat->longitude;

        $properti=DB::table('properti')->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->rightJoin("users","users.id","=","properti.id_user")->leftJoin("sewa","sewa.id_property","=","properti.id_properti")->
        select("users.name as pemilik","properti.*","properti_img.link","properti_img.tipe",DB::raw("
        111.111 *
            DEGREES(ACOS(LEAST(COS(RADIANS(lat))
                * COS(RADIANS(".$lat."))
                * COS(RADIANS(lng - ".$lng."))
                + SIN(RADIANS(lat))
                * SIN(RADIANS(".$lat.")), 1.0))) AS distance"))->having("distance","<","3")->where("kategori",$r->kategori)->where("aktif","aktif");
        
        $properti=$properti->get();
                
        
        return response()->json($properti);
    }
    
}
