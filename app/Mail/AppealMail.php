<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AfterRegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $appeal;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $appeal)
    {
        $this->appeal = $appeal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->appeal->theme;

        return $this->from('info@inamr.ru')
            ->subject($subject)
            ->view('email.appeal', [
                'appeal' => $this->appeal,
            ]);
    }
}
