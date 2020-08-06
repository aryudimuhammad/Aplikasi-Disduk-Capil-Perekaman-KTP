<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifikasiPerpanjangCuti extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mails.VerifikasiPerpanjangCuti')->with([
            'nip' => $this->data->cuti->pegawai->nip,
            'nama' => $this->data->cuti->pegawai->user->name,
            'status' => $this->data->status,
        ]);
    }
}
