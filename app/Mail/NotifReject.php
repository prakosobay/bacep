<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\CleaningController;

class NotifReject extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->view('reject')
            ->with(

                [
                    'nama' => 'Badai Sino',
                    'pesan' => 'ditolak'
                    // 'id' => $request->cleaning_id,
                    // 'validity' => $request->validity_from,
                    // 'purpose_work' =sssssss> $request->request_work,
                ]
            );
    }
}
