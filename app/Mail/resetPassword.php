<?php

namespace App\Mail;

use App\Traits\generics;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels, generics;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset-password')
            ->with([
                'site_root' => $this->site_root,
                'site_name' => $this->site_name,
                'address' => $this->address,
                'preheader' => 'Reset your '.$this->site_name.' account password.',
            ]);
    }
}
