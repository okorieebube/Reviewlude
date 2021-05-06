<?php

namespace App\Mail;

use App\Models\User;
use App\Traits\generics;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class accountConfirmation extends Mailable
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
        return $this->view('emails.account-confirmation')
        ->with([
            'site_root' => $this->site_root,
            'site_name' => $this->site_name,
            'address' => $this->address,
            'preheader' => 'Verify that you have access to this account.',
        ]);
    }
}
