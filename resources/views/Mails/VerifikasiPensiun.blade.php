@component('mail::message')
Nama : {{$nama}} <br>
NIP : {{$nip}} <br>
<br>
@if($status == 2)
Pengusulan Pensiun Anda Telah Disetujui. <br>
@else
Pengusulan Pensiun Tidak Disetujui. <br>
@endif
<br>
TerimaKasih,<br>
<a style="text-decoration: none;" href="['url' => 'http://127.0.0.1:8000/']">Disdukcapil</a> Kota Banjarbaru<br>
@endcomponent
