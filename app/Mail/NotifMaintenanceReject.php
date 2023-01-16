<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifMaintenanceReject extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $note;

    /**
     * Create a new message instance.
     *
     * @var \App\Models\Other
     */

    public function __construct($data, $note)
    {
        $this->data = $data;
        $this->note = $note;
    }

    /**
     * Build the message.
     *
     * @return void
     */

    public function build()
    {
        return $this->from('permit.dc@balitower.co.id')->view('other.maintenance_reject_notif');
    }
}
