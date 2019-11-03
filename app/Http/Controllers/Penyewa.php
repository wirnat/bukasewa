<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Penyewa extends Controller
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori=DB::table('kategori')->get();
    }

    public function favorit()
    {
        $data['pencarian']="false";
        $data['breadcrumb']="show";
        $data['kategori']=$this->kategori;
        $data['me']=auth()->user();
        $data['favorits']=
        DB::table('rekam_jejak')->
        select("rekam_jejak.*","properti.properti","properti.alamat","properti.harga","kategori.kategori","properti_img.link")->
        leftJoin("properti","properti.id_properti","=","rekam_jejak.id_iklan")->
        leftJoin("kategori","kategori.id","=","properti.kategori")->
        leftJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->
        where("aksi","simpan")->where("rekam_jejak.id_user",auth()->user()->id)->groupBy("rekam_jejak.id_iklan")->get();
        return view("customer.favorit",$data);
    }

    public function login()
    {
        # controller penyewa
        return view("auth.penyewa_login");


    }
}
