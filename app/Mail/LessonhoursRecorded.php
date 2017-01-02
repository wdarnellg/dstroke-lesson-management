<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Hoursused;
use App\Lessonhours;

class LessonhoursRecorded extends Mailable
{
    use Queueable, SerializesModels;
    public $hoursused;
    public $lessonhours;
    public $players;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Hoursused $hoursused)
    {
        $this->hoursused = $hoursused;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('dstroketennis@gmail.com', 'dstroke-lesson-management')
       ->subject('You Used Some Tennis Time')
       ->view('admin.email.hoursusednotification');
    }
}
