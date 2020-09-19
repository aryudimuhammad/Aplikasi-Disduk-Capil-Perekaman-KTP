<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranKTP extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ktp)
    {
        $this->ktp = $ktp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mails.Pendaftaranktp')->with([
            'id' => $this->ktp->id,
            'nama' => $this->ktp->nama,
            'permohonan' => $this->ktp->permohonan,
            'status' => $this->ktp->status_ktp,
            'keterangan' => $this->ktp->keterangan,
        ]);
    }
}
