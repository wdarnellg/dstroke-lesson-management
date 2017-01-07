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
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lessonhours $lessonhours, Hoursused $hoursused)
    {
        $this->lessonhours = $lessonhours;
        $this->hoursused = $hoursused;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('dstroketennis@gmail.com', 'D`Stroke Tennis Lesson Hours Mgmt')
       ->subject('You Used Some Tennis Time')
       ->view('admin.email.hoursusednotification');
    }
}
