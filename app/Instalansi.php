<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Notifications\Notifiable;

class Instalansi extends Model
{
    use Notifiable;
    use Uuid;
}
