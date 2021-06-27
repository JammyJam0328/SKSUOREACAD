<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Request;
class GmailSending extends Mailable
{
    use Queueable, SerializesModels;

    public $emailDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailDetails)
    {
        $this->emailDetails=$emailDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject("Email from SKSU OREACAD")->view('emails.email',[
            'request'=>Request::where('id',$this->emailDetails['request_id'])->first()
        ]);
    }
}