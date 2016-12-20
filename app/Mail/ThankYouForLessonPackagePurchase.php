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
    public $player = 'Great Player';
    public $package = '4 Great Hours';
    public $email;
    public $lessonhours;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    //     return $this->view('admin.email.lessonpackagenotification')
    //                         ->from($email, $name)
    //                         ->subject($subject);
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = 'cool@test.com';
        $player = 'Cool New Client';
        $name = 'Big D';
        $package = '4 Great Lesson Hours';
        $subject = 'Testing This Shit';
        return $this->view('admin.email.lessonpackagenotification')
                    ->with($package, $player);
    }
}
