<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $course_name;
    public $language;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$course_name)
    {
        $this->details=$details;
        $this->course_name=$course_name;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail From P_L_W Website')->view('mail')->from('lemonemontwin121@gmail.com');
    }
}
