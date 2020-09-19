@component('mail::message')
Hai {{$nama}},

@if($permohonan == 1 && $status == 2)
<a href="{{route('ktpsementaraCetak',['id' => $id])}}" target="_blank" class="dropdown-item">Cetak KTP Sementara</a>
@endif

@if($status == 1 )
Pendaftaran KTP dengan Status Permohonan @if($permohonan == 1) Pembuatan KTP Baru @elseif($permohonan == 2 ) Perpanjang KTP @else Pergantian KTP @endif sudah terkirim, Silahkan tunggu Konfirmasi dari Admin Disdukcapil. <br>
@elseif($status == 2)
Pendaftaran KTP dengan Status Permohonan @if($permohonan == 1) Pembuatan KTP Baru @elseif($permohonan == 2 ) Perpanjang KTP @else Pergantian KTP @endif sudah terverifikasi. Silahkan Tunggu, kami sedang memproses pembuatan KTP anda. <br>
@elseif($status == 3)
Pendaftaran KTP dengan Status Permohonan @if($permohonan == 1) Pembuatan KTP Baru @elseif($permohonan == 2 ) Perpanjang KTP @else Pergantian KTP @endif Gagal/Tidak terverifikasi, Karena Kesalahan Data. <br> <br>
Keterangan : <br>
{{$keterangan}} <br>
@else
Pendaftaran KTP dengan Status Permohonan @if($permohonan == 1) Pembuatan KTP Baru @elseif($permohonan == 2 ) Perpanjang KTP @else Pergantian KTP @endif Sudah Selesai. Silahkan Ambil KTP Anda. <br>
@endif


@component('mail::button', ['url' => 'http://127.0.0.1:8000/home/show', 'color' => 'primary'])
Klik Disini Untuk Melihat Daftar Pendaftaran KTP
@endcomponent

TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">Disdukcapil</a> Kota Banjarbaru<br>
@endcomponent
