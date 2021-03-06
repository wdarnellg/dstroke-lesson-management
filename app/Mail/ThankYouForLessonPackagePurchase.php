<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Lessonhours;


class ThankYouForLessonPackagePurchase extends Mailable
{
    use Queueable, SerializesModels;
    
    public $lessonhours;
    public $players;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lessonhours $lessonhours)
    {
        $this->lessonhours = $lessonhours;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $this->from('dstroketennis@gmail.com', 'dstroke-lesson-management')
       ->subject('Thank You for Your Lesson Package Purchase')
       ->view('admin.email.lessonpackagenotification');
    }
}
