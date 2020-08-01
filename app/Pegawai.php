<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use Notifiable;
    use Uuid;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function cuti()
    {
        return $this->hasOne(Cuti::class);
    }

    public function pensiun()
    {
        return $this->hasOne(Pensiun::class);
    }
}
