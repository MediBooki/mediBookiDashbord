<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $setting = Setting::first();
        $adminEmail = $setting->gmail;

        return $this->from($adminEmail)->subject('Reset Password')
                    ->view('emails.reset_password');
    }
}
