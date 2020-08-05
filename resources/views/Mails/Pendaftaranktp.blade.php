@component('mail::message')
Hai {{$nama}},

Pendaftaran KTP dengan Status Permohonan @if($permohonan == 1) Pembuatan KTP Baru @elseif($permohonan == 2 ) Perpanjang KTP @else Pergantian KTP @endif sudah terkirim, Silahkan tunggu Konfirmasi dari Admin Disdukcapil. <br>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home/show', 'color' => 'primary'])
Klik Disini Untuk Melihat Daftar Pendaftaran KTP
@endcomponent

TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">Disdukcapil</a> Kota Banjarbaru<br>
@endcomponent
