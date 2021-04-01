<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTemp1 extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->from('noreply@mail.com')
            ->view('mailtemp1')
            ->with(
                [
                    'nama' => 'Om Bagoes',
                    'website' => 'ombagoes.com',
                ]
            );
    }
}
