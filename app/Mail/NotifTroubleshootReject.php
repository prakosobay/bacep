<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifTroubleshootReject extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $note;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($content, $note)
    {
        $this->content = $content;
        $this->note = $note;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('permit.dc@balitower.co.id')->view('other.troubleshoot_notif_reject');
    }
}
