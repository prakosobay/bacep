<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cleaning;

class NotifReject extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * The order instance.
     *
     * @var \App\Models\Cleaning
     */

    // protected $cleaning;

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

            $this->from('testing.dc@balitower.co.id')
            ->view('reject');
        // ->with(

        //     [
        //         'nama' => 'Badai Sino',
        //         'pesan' => 'ditolak',
        //         // 'id' => $this->cleaning->cleaning_id,
        //         // 'validity' => $this->cleaning->validity_from,
        //         // 'purpose_work' => $this->cleaning->cleaning_work,
        //     ]
        // );
    }
}
