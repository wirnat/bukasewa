<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\Testimonial;
use App\Properti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
        $kata="";
        if ($data_tempat->tag=="kampus") {
            $kata=$data_tempat->tag;
        }
        
        $data['pencarian']=count($data['properti'])." Hunian disekitar $kata".$tempat;
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
            $properti=$properti->having("distance","<","10");
        }elseif(!empty($r->radius)){
            $properti=$properti->having("distance","<",$r->radius);
        }if (!empty($r->status)) {
            $properti=$properti->where("status",$r->status);
        }if (!empty($r->kamar)) {
            $properti=$properti->where("kamar",">=",$r->kamar);
        }if ($r->jarak=="show") {
            $data['jarak']="show";
        }
        $data['jarak']="show";
        if($r->durasi!=""){
            $data["rangeharga"]="Harga mulai dari ".$r->vmin." hingga ".$r->vmax."";
            $min=str_replace(".","",$r->vmin);
            preg_match_all('!\d+!', $min, $vmin);
            
            $max=str_replace(".","",$r->vmax);
            preg_match_all('!\d+!', $max, $vmax);
            
            $properti=$properti->where("sewa.durasi",$r->durasi)->whereRaw("digits(sewa.harga) >= ".implode(" ",$vmin[0])."")->whereRaw("digits(sewa.harga) <=".implode(" ",$vmax[0])."");
            // print_r($min);
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
        $data['pencarian']=count($data['properti'])." ".$kategori." di sekitar".$shortlokasi[0].",".$shortlokasi[1];
       
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
        $data['properti']=DB::table('properti')->select("properti.*","properti_img.link")->leftJoin('region','region.id',"=","properti.region")->where('properti.id_properti',$id)->leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->where('properti_img.tipe',"img")->first();
        $data['fitur']=DB::table('properti_fitur')->join("fitur","fitur.id_fitur","=","properti_fitur.id_fitur")->where('id_properti',$id)->get();
        $data['imgs']=DB::table('properti_img')->where('id_properti',$id)->where("tipe","img")->get();
        $data['harga']=DB::table('sewa')->where('id_property',$id)->get();
        $data['vendor']=DB::table('users')->where("tipeakun","vendor")->where("id",$data['properti']->id_user)->first();
        $data['video']=DB::table('properti_img')->where('id_properti',$id)->where('tipe','video')->get();
        $data['kategori']=$this->kategori;
        $data['search']="false";
        $data['message']=Session::get('message');
        $data['error']=Session::get('error-message');
        $data['status']=Session::get('status');
        if (Auth::check()) {
            $data['cek_love']=DB::table('rekam_jejak')->where("id_user",auth()->user()->id)->where("id_iklan",$id)->where("aksi",'simpan')->get();
        } else {
            $data['cek_love']=DB::table('rekam_jejak')->where("id_user","nothing")->where("id_iklan",$id)->where("aksi",'simpan')->get();
        }
        
        
        // print_r($data['properti']);

        $data['testimonials']=Testimonial::select(
                                                'properti_testimonials.id as id', 
                                                'properti_testimonials.id_properti as id_properti',
                                                'properti_testimonials.comment as comment', 
                                                'properti_testimonials.rate as rate',
                                                'properti_testimonials.id_user as id_user',
                                                'properti_testimonials.show as show',
                                                'properti_testimonials.created_at as created_at',
                                                'users.name as name',
                                                'users.img as img'
                                                )
                                                ->leftJoin("properti","properti.id_properti","=","properti_testimonials.id_properti")
                                                ->leftJoin("users","users.id","=","properti_testimonials.id_user")
                                                ->where([
                                                        ['properti_testimonials.show','=',1],
                                                        ['properti_testimonials.id_properti',$id]
                                                        ])->get();
        // dd($data['testimonials']);
        
        $data['total_rating']=Testimonial::where('properti_testimonials.id_properti',$id)->sum('rate');
        
        if($data['total_rating'] === 0){
            $data['user_rating'] = 1;
        }else{
            $data['user_rating']=Testimonial::where('properti_testimonials.id_properti',$id)->count('id_user');
        }
            
        $data['average_rating']= $data['total_rating'] / $data['user_rating'];
        // dd($data['average_rating']);

        $user_id = array();
        foreach ($data['testimonials'] as $row){
            array_push($user_id, $row->id_user);
        }
        
        $data['user_comment']=Users::select('name','img')->whereIn("id",$user_id)->get();
        
        $data['id'] = $id;

        return view('customer.detailproperti',$data);
    }

    public function store(Request $request)
    {
        $id_user = \Auth::user()->id;
          
        // check User comment
        $user_id = Testimonial::where([['id_user','=',$id_user], ['id_properti','=',$request->id_properti]])->count();
        // dd($user_id);
        if($user_id > 0){
            return redirect()->back()->with('comment', 'Tidak dapat mengulas lagi.');
        }
        
        $comment = new Testimonial;
        // $comment->id_properti       = "h5d9a372349a6c";
        $comment->id_properti       = $request->id_properti;
        $comment->comment           = $request->comment;
        $comment->rate              = $request->star;
        $comment->id_user           = $id_user;
        $comment->show              = 0;
        $comment->save();

        return redirect()->back()->with('alert', 'Ulasan telah terposting dan sedang menunggu persetujuan penyedia hunian untuk ditampilkan');
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
