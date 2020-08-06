<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use Notifiable;
    use Uuid;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function perpanjang()
    {
        return $this->belongsTo(Perpanjang::class);
    }
}
