<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationAccept extends Mailable
{
    use Queueable, SerializesModels;

    protected $reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.reservation')->with([
            'date'=> $this->reservation->date,
            'time'=> $this->reservation->time,
            'count'=> $this->reservation->person_count,
            'name'=> $this->reservation->user->name
        ]);
    }
}
