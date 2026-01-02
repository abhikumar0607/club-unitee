<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminRsvpConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    //Get event and user
    public $event;
    public $user;

    //Function for construct
    public function __construct($event, $user) {
        $this->event = $event;
        $this->user  = $user;
    }
    
    //Function for build
    public function build() {
        return $this->subject('New RSVP Confirmed')
        ->view('admin.emails.rsvp-confirmed');
    }
}


