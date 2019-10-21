<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\MdVendor;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;



Route::get("/","Home@index");
Route::get('find/',"Property@find")->name("filter");
Route::post("rekomen","Home@api_rekomen");
Auth::routes();
Route::get('/laravel', 'HomeController@index')->name('home');
Route::post('detail/properti', "Property@api_detailproperti");
Route::post('load/magnify', "Property@api_magnify");
Route::get('detail/properti/{id}', 'Property@detail')->name('detail_prop');
Route::post('signing/', "Customer@signing");
Route::get('belipaket/',"Vendor\Iklan@pricing");
Route::get('hunian/kategori/{id}', 'Property@kategori');
Route::get('hunian/', 'Property@list');
Route::get('hunian-murah-di/{provinsi}', 'Property@regionlist');
Route::get('hunian-murah-di-kabupaten/{kabupaten}', 'Property@district');
Route::get('hunian-murah-disekitar/{tempat}', 'Property@around');
Route::post('/get/kampus_all', function () {
    $data=DB::table('tempat')->where('tag','kampus')->orderBy("nama","asc")->get();
    return response()->json($data);
});
Route::post('/get/tempat', function () {
    $data=DB::table('tempat')->get();
    echo json_encode($data);
});
Route::post('/get/kampus', function (Request $r) {
    $data=DB::table('tempat')->where("provinsi",$r->id)->where("tag","kampus")->orderBy("nama","asc")->get();
    echo json_encode($data);
});

Route::post('/get/koordinat', function (Request $r) {
    $data=DB::table('tempat')->where("id",$r->id)->orderBy("nama","asc")->first();
    return response()->json($data);
});
Route::post('/get/cari_disekitar', "Property@cariSekitar");

Route::post('/get/detail/region', function (Request $r) {
    $data=DB::table('tempat')->leftJoin("region","region.id","=","tempat.provinsi")->select("tempat.*","region.title_deskripsi","region.deskripsi","region.provinsi  as prov_name","region.img")->where('tempat.provinsi',$r->prov)->orderBy('tempat.nama','asc')->get();
    return response()->json($data, 200);
});

Route::post('/get/detail/region/all', function () {
    $data=DB::table('tempat')->leftJoin("region","region.id","=","tempat.provinsi")->select("tempat.*","region.title_deskripsi","region.deskripsi","region.provinsi  as prov_name","region.img")->orderBy('tempat.nama','asc')->get();
    return response()->json($data, 200);
});

//vendor panel
Route::group(['middleware' => [MdVendor::class]], function () {

Route::get('vendor/',"Vendor\Dashboard@index");
Route::get('vendor/iklan/edit/{id}',"Vendor\Iklan@editiklan");
Route::get('vendor/iklan/tambah',"Vendor\Iklan@tambahiklan");
Route::get('vendor/iklan/kelola',"Vendor\Iklan@kelolaiklan");
Route::post('api/tambahiklan', "Vendor\Iklan@api_tambahiklan")->name('tambahiklan');
Route::post('/api/load/hargasewa', "Vendor\Iklan@load_hargasewa")->name('hargasewa');
Route::post('/api/update/hunian', "Vendor\Iklan@api_update")->name('h_update');
Route::post('/api/update/hunian/sewa', "Vendor\Iklan@api_updatesewa")->name('hs_update');
Route::post('/api/update/hunian/fasilitas', "Vendor\Iklan@api_updatefasilitas")->name('hf_update');
Route::post('/api/getfitur/detail', "Vendor\Iklan@fitur");
Route::post('/api/insert/image', "Vendor\Iklan@insertImg");
Route::post('/api/delete/img', "Vendor\Iklan@deleteImg");
Route::post('/api/update/hunian/lokasi', "Vendor\Iklan@api_updateLokasi");
Route::post('/api/update/hunian/status', 'Vendor\Iklan@api_updateStatus');
});
