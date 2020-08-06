<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Perpanjang extends Model
{
    use Notifiable;
    use Uuid;

    public function cuti()
    {
        return $this->hasOne(Cuti::class);
    }
}
