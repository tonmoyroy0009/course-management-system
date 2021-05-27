<?php

namespace App;

Use Illuminate\Mail\Mailer as Mail;

abstract class BaseMail
{
    private $mail;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function send($person, $view, $data, $subject)
    {
        $view = view_path($view);

        \Mail::send($view, $data, function($message) use($person, $subject)
        {
            $message->to($person->email)
                ->subject($subject);

            $message->from(env('MAILGUN_NAME'), env('MAILGUN_EMAIL'));
        });
    }

    public function queue($person, $view, $data, $subject)
    {
        \Mail::queue($view, $data, function($message) use($person, $subject)
        {
            $message->to($person->email)
                ->subject($subject);

            $message->from(env('MAILGUN_NAME'), 'MAILGUN_EMAIL');
        });
    }
}