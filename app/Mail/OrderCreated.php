<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = null)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
//            ->from('ilhanet.lan@gmail.com', 'Delivery 24 Horas')

            ->view('emails.emailOrderCreated')
            ->with([
                'greeting' => 'Ordem Criada',
                'introLines' => [
                    'teste'
                ],
                'outroLines' => [
                    'teste2'
                ],
            ]);
    }
}
