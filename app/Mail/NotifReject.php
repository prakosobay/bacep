<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifReject extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * The order instance.
     *
     * @var \App\Models\Cleaning
     */

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return void
     */
    public function build()
    {
        return

            $this->from('permit.dc@balitower.co.id')
            ->view('reject');
    }
}
