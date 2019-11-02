<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Properti as PropertiResources;

class Iklan extends Controller
{
    public function index()
    {
        $properti=DB::table('properti')->get();
        return PropertiResources::collection($properti)->additional(["meta"=>['version'=>'1.0.0','API_base_url'=>url('/')]]);
    }
}
