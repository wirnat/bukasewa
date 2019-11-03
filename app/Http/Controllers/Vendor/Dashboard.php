<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use App\Testimonial;
use App\Properti;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    public function index()
    {
        $data['me']=DB::table('users')->join("paket","paket.id_paket","=","users.paket")->select("users.*","nama_paket",DB::raw('(select count(*) from properti where properti.id_user=users.id and aktif="aktif") as jumlah_paket'))->where("users.id",auth()->user()->id)->first();
        // dd($data['me']);    
        $data['properti']=DB::table('properti')->rightJoin("properti_img","properti_img.id_properti","=","properti.id_properti")->where("id_user",auth()->user()->id)->where("tipe","img")->groupBy("properti.id_properti")->get();
        
        $id_user = \Auth::user()->id;
        $user_properti=DB::table('properti')->select('id_properti')->where('id_user',$id_user)->first();
        // dd($user_properti);    

        $data['testimonials']=Testimonial::select(
            'properti_testimonials.*',
            'users.name as name',
            'users.img as img',
            'properti.id_user as pemilik'
            )
            ->leftJoin("properti","properti.id_properti","=","properti_testimonials.id_properti")
            ->leftJoin("users","users.id","=","properti_testimonials.id_user")->where("properti.id_user",auth()->user()->id)->get();
        return view("vendors.dashboard",$data);
    }

    public function changeStatusTesti(Request $request)

    {
        $status=DB::table("properti_testimonials")->where("id",$request->id)->first()->show;
     
        $message=null;
        $respon=null;
        $data=[];
        if ($status=="1"){
            $message="nonaktif";
            $value = "0";
            DB::table('properti_testimonials')->where('id',$request->id)->update(['show'=>$value]);
            $data['message']="Komen berhasil di".$message."kan";
            $data['status']="success";
        }elseif($status=="0"){
            $message="aktif";
            $value = "1";
            DB::table('properti_testimonials')->where('id',$request->id)->update(['show'=>$value]);
            $data['message']="Komen berhasil di".$message."kan";
            $data['status']="success";
        }
        
        $respon=response()->json($data);
        // dd($respon);
        return $respon;
    }
}
