@component('mail::message')
<h4>Kode invoice anda : {{$data->id_transaksi}}</h4>
<h4>Paket akun : {{$data->nama_paket}}</h4>
<h4>Harga : {{$data->harga}}</h4>
<hr>
<p>Paketmu akan segera diaktifkan, silahkan lakukan tahap berikut :</p>
<ol>
    <li>Masukkan <b>{{$data->id_transaksi}}</b> di kolom referal pada saat akan melakukan transfer pembayaran</li>
    <li>Transfer pembayaran sesuai harga ke rekening : <b>BCA</b> 2810062579 (yodi fadhil)</li>
    <li>Tunggu proses upgrade dari admin kami</li>
    <hr>
    Jika kamu sudah membayar tapi paket belum diupgrade dalam waktu 1x24jam, silahkan konfirmasi terlebih dahulu <a href='https://bukasewa.com/konfirmasi_transaksi/{{$data->id_transaksi}}'>disini</a>
</ol>
<hr>

<br>
Thanks for attention | Bukasewa.com 
@endcomponent
