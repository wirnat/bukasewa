<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Watermark;

class Iklan extends Controller
{

    public $wm;
    public function __construct()
    {
      $this->wm=new Watermark(); 
    }
    public function tambahiklan()
    {
        $data['kategori']=DB::table('kategori')->get();
        $data['fitur']=DB::table('fitur')->get();
        $data['provinsi']=DB::table('region')->get();
        return view("vendors.tambahkan_iklan",$data);
    }

    public function pricing()
    {
        $data["me"]=auth()->user();
        $data["paket"]=DB::table('paket')->get();
        $data['search']="false";

        return view("vendors.beli_paket",$data);
    }

    public function api_tambahiklan(Request $r)
    {
        $harga="-";
        $id=uniqid("h");

        DB::table('properti')->insert([
            'id_properti'=>$id,
            "properti"=>$r->nama,
            'status'=>$r->status,
            'id_user'=>auth()->user()->id,
            'lng'=>$r->lng,
            'lat'=>$r->lat,
            'alamat'=>$r->alamat,
            'kategori'=>$r->kategori,
            'kamar'=>$r->bed,
            'toilet'=>$r->toilet,
            'garasi'=>$r->garasi,
            'tv'=>$r->tv,
            'deskripsi'=>$r->desk,
            'harga'=>$harga,
            'luasruangan'=>$r->luas,
            'whatsapp'=>$r->hp,
            'region'=>$r->region
        ]);

        if ($r->status=="sewa") {
            if ($r->harian!="0"||!empty($r->harian)) {
                DB::table('sewa')->insert([
                    "id_sewa"=>uniqid("s"),
                    "id_property"=>$id,
                    "durasi"=>"hari",
                    "harga"=>$r->harian
                ]);
                $harga=$r->harian;
                DB::table('properti')->where("id_properti",$id)->update(["harga"=>$harga.'/hari']);
            }
            if ($r->tahunan!="0"||!empty($r->tahunan)) {
                DB::table('sewa')->insert([
                    "id_sewa"=>uniqid("s"),
                    "id_property"=>$id,
                    "durasi"=>"tahun",
                    "harga"=>$r->tahunan
                ]);
                $harga=$r->tahunan;
                DB::table('properti')->where("id_properti",$id)->update(["harga"=>$harga.'/tahun']);
            }
            if ($r->bulanan!="0"||!empty($r->bulanan)) {
                DB::table('sewa')->insert([
                    "id_sewa"=>uniqid("s"),
                    "id_property"=>$id,
                    "durasi"=>"bulan",
                    "harga"=>$r->bulanan
                ]);
                $harga=$r->bulanan;
                DB::table('properti')->where("id_properti",$id)->update(["harga"=>$harga.'/bulan']);
            }
        } else {
            $harga=$r->hargajual;
            DB::table('properti')->where("id_properti",$id)->update(["harga"=>$harga]);
        }
        
        //insert fitur
        $fitur=json_decode($r->fitur);
        if (count($fitur)>0) {
            for ($i=0; $i < count($fitur) ; $i++) { 
                DB::table('properti_fitur')->insert(['id_fitur'=>$fitur[$i],"id_properti"=>$id]);
            }
        }

        //insert gambar
        $imgs=$r->imgs;
        if (count($imgs)>0) {
            for ($i=0; $i < count($imgs) ; $i++) {
                $name=uniqid("img").$imgs[$i]->getClientOriginalName();
                $link="img/properties/".$name; 
                $this->wm->add($imgs[$i],$link);
                DB::table('properti_img')->insert(['id_properti'=>$id,"link"=>$link,"tag"=>"myimg","tipe"=>"img","uploaded_by"=>auth()->user()->id]);
            }
        }

        //insert video
        if (!empty($r->video)) {
            $video=$r->video;
            $video=preg_replace("#.*youtube\.com/watch\?v=#","",$video);
            $video="https://www.youtube.com/embed/".$video;
            DB::table('properti_img')->insert(['id_properti'=>$id,"link"=>$video,"tag"=>"myvideo","tipe"=>"video","uploaded_by"=>auth()->user()->id]);
        }
        return response()->json("Sukses Menambah");

       
    }

    public function kelolaiklan()
    {
        $data['me']=DB::table('users')->join("paket","paket.id_paket","=","users.paket")->select("users.*","nama_paket",DB::raw('(select count(*) from properti where properti.id_user=users.id and aktif="aktif") as jumlah_iklan'))->where("users.id",auth()->user()->id)->first();
        $data['properti']=DB::table('properti')->join("kategori","kategori.id","=","properti.kategori")->select("properti.*","kategori.kategori as kat")->where("id_user",auth()->user()->id)->get();
        return view("vendors.kelola_iklan",$data);
    }
    public function editiklan($id)
    {
        $data["allfitur"]=DB::table('fitur')->get();
        $data["imgs"]=DB::table('properti_img')->where("tipe","img")->where("id_properti",$id)->get();
        $data['fitur']=DB::table('fitur')->select("fitur.*",DB::raw("if(properti_fitur.id_properti='".$id."','checked','') as cek"))->leftJoin("properti_fitur","properti_fitur.id_fitur","=","fitur.id_fitur")->where("id_properti",$id)->get();
        $data['me']=DB::table('users')->join("paket","paket.id_paket","=","users.paket")->select("users.*","nama_paket",DB::raw('(select count(*) from properti where properti.id_user=users.id and aktif="aktif") as jumlah_iklan'))->where("users.id",auth()->user()->id)->first();
        $data['kategori']=DB::table('kategori')->get();
        $data['provinsi']=DB::table('region')->get();
        $data['properti']=DB::table('properti')->where("id_properti",$id)->first();
        //  print_r($data["properti"]);
        return view("vendors.editiklan",$data);
    }
    public function load_hargasewa(Request $r)
    {
       $res=DB::table('sewa')->where("id_property",$r->id)->get();
       return response()->json($res);
    }
    public function api_updatelokasi(Request $r)
    {
       $res=DB::table('properti')->where("id_properti",$r->id)->update(['region'=>$r->provinsi,'alamat'=>$r->alamat,'lat'=>$r->coordinate['lat'],'lng'=>$r->coordinate['lng']]);
       return response()->json($res);
    }
    public function api_update(Request $r)
    {
        switch ($r->index) {
            case 'properti':
                DB::table('properti')->where("id_properti",$r->id)->update(["properti"=>$r->value]);
                break;
            case 'kategori':
                DB::table('properti')->where("id_properti",$r->id)->update(["kategori"=>$r->value]);
                break;
            case 'deskripsi':
                DB::table('properti')->where("id_properti",$r->id)->update(["deskripsi"=>$r->value]);
                break;
            case 'whatsapp':
                DB::table('properti')->where("id_properti",$r->id)->update(["whatsapp"=>$r->value]);
                break;
            default:
                
                break;
        }
        return response()->json("sukses");
    }
    public function api_updatesewa(Request $r)
    {
        switch ($r->index) {
              
            case 'addsewa':
                DB::table('sewa')->insert(['id_sewa'=>uniqid("s5"),'harga'=>$r->harga,'durasi'=>$r->durasi,'id_property'=>$r->id]);
                break; 
            case 'removesewa':
                DB::table('sewa')->where("id_property",$r->id)->where("durasi",$r->durasi)->delete();
                break;
        }
        $this->autofill($r->id);
        return response()->json("sukses");

    }

    public function api_updatefasilitas(Request $r)
    {
    if (count($r->fasilitas)>0) {
        DB::table('properti_fitur')->where("id_properti",$r->id)->delete();
        for ($i=0; $i < count($r->fasilitas); $i++) { 
            DB::table('properti_fitur')->insert(["id_properti"=>$r->id,"id_fitur"=>$r->fasilitas[$i]]);
        }
        $status="fasilitas sukes";
    }else{
        $status="fasilitas error";
    }
       
       DB::table('properti')->where("id_properti",$r->id)->update(["kamar"=>$r->bed,"toilet"=>$r->toilet,"garasi"=>$r->garasi,"tv"=>$r->tv]);
       return response()->json($r->fasilitas[0]);
    }

    public function autofill($id)
    {
        $cek_hargabulan=DB::table('sewa')->where("durasi","bulan")->where('id_property',$id)->orderBy("diupdate_pada","desc");
        $cek_hargatahun=DB::table('sewa')->where("durasi","tahun")->where('id_property',$id)->orderBy("diupdate_pada","desc");
        $cek_hargahari=DB::table('sewa')->where("durasi","hari")->where('id_property',$id)->orderBy("diupdate_pada","desc");
        if (count($cek_hargabulan->get())>0) {
            DB::table('properti')->where("id_properti",$id)->update(["harga"=>$cek_hargabulan->first()->harga."/bulan"]);
        } elseif(count($cek_hargatahun->get())>0) {
            DB::table('properti')->where("id_properti",$id)->update(["harga"=>$cek_hargatahun->first()->harga."/tahun"]);
        } elseif(count($cek_hargahari->get())>0){
            DB::table('properti')->where("id_properti",$id)->update(["harga"=>$cek_hargahari->first()->harga."/hari"]);
        }else{
            DB::table('properti')->where("id_properti",$id)->update(["harga"=>"belum ditentukan"]);
        }
        
    }
    public function fitur(Request $r)
    {
        $d=DB::table('properti_fitur')->where("id_properti",$r->id)->get();
        return response()->json($d);
    }

    public function insertImg(Request $r)
    {
        //insert gambar
        $imgs=$r->img;
        $link="";
        if (count($imgs)>0) {
            for ($i=0; $i < count($imgs) ; $i++) {
                $name=uniqid("img").$imgs[$i]->getClientOriginalName();
                $this->wm->add($imgs[$i],"img/properties/".$name);
                
                $link="img/properties/".$name; 
                DB::table('properti_img')->insert(['id_properti'=>$r->id,"link"=>$link,"tag"=>"myimg","tipe"=>"img","uploaded_by"=>auth()->user()->id]);
            }
        }   

        $data["link"]=$link;
        $data["id"]=DB::table('properti_img')->where("link",$link)->first()->id_img;
        return response()->json($data);
    }

    public function deleteImg(Request $r)
    {
        DB::table('properti_img')->where("id_img",$r->id)->delete();
        return response()->json("Gambar berhasil dihapus");
    }

    public function api_updateStatus(Request $r)
    {
        $status=DB::table('properti')->where('id_properti',$r->id)->first()->aktif;
        $message=null;
        $respon=null;
        $me=DB::table('users')->join("paket","paket.id_paket","=","users.paket")->select("users.*","nama_paket",DB::raw('(select count(*) from properti where properti.id_user=users.id and aktif="aktif") as jumlah_iklan'))->where("users.id",auth()->user()->id)->first();
        $paket=DB::table('paket')->where("id_paket",$me->paket)->first();
        $data=[];
        if ($status=="aktif"){
            $message="nonaktif" ;
            DB::table('properti')->where('id_properti',$r->id)->update(['aktif'=>$message]);
            $data['message']="Iklan berhasil di".$message."kan";
            $data['status']="success";
        }else if($status=="nonaktif") {
            $message="aktif" ;
            if ($me->jumlah_iklan>$paket->max_iklan-1) {
                DB::table('properti')->where('id_properti',$r->id)->update(['aktif'=>'nonaktif']);
                $data['message']="Iklan gagal diaktifkan, max iklan anda ".$paket->max_iklan;
                $data['status']="error";
            }else{
                $message="aktif" ;
                DB::table('properti')->where('id_properti',$r->id)->update(['aktif'=>$message]);
                $data['message']="Iklan berhasil di".$message."kan";
                $data['status']="success";
            }
        }
        
        $data['statuz']='status '.$status;
        $data['jumlahpaket']=$me->jumlah_iklan;
        $data['maxiklan']=$paket->max_iklan;
        $respon=response()->json($data);
        return $respon; 
    }
}

