<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use Notifiable;
    use Uuid;

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }
}
