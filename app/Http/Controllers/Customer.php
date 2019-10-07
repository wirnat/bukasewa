<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Customer extends Controller
{
    public function signing(Request $r)
    {
        Session::put('email', $r->email);
        Session::put('phone', $r->phone);
        Session::put('status', 'in');
        if (DB::table('users')->where('email',$r->email)->where('tipeakun','customer')->get()->count()>0) {
            DB::table('users')->where('email',$r->email)->update(["name"=>$r->name,"phone"=>$r->phone,"tipeakun"=>"customer"]);
        } else {
            DB::insert('insert into users (email, name,phone,tipeakun) values (?, ?,?,?)', [$r->email, $r->name, $r->phone, "customer"]);
        }
        return Redirect::back()->with('message','Terimakasih, kamu sudah menjadi bagian dari kami.')->with("message-tiny","silahkan lihat dan hubungi penyedia hunian yang kamu inginkan");
    }
}
