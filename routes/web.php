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
Route::get('hunian/region/{id}', 'Property@regionlist');
Route::post('/get/kampus', function () {
    $data=DB::table('tempat')->where('tag','kampus')->get();
    return response()->json($data);
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
