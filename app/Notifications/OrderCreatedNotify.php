<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NumberFormatter;

class OrderCreatedNotify extends Notification
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
//            ->greeting('Nova Ordem')
//            ->line('The introduction to the notification.')
//            ->action('Notification Action', 'https://laravel.com')
//            ->line('Thank you for using our application!')
        ;

        if (!is_null($this->data)){
            $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);

            $address = $this->data->address->logradouro.', '.$this->data->address->numero.' - '.$this->data->address->bairro.' / CEP:'.$this->data->address->cep;
            $mailMessage
                ->success()
                ->greeting('Nova Ordem')
                ->line($this->data->message)
                ->line('Valor Total: '.$formatter->format($this->data->valor_total))
                ->line('Obs.: '.$this->data->observacao)
                ->line('Endereço: '.$address)
                ->line('Endereço Compl.: '.$this->data->address->complemento)
                ->line('Endereço Obs.: '.$this->data->address->obs)
                ->action('Confirmar Ordem nº'.$this->data->id, env('ERPNET_URL').'/confirmations/confirm/'.$this->data->id)
                ->line('Ordens Abertas: ' . env('ERPNET_URL').'/orders/abertas')
                ->line('Todas as Ordens: ' . env('ERPNET_URL').'/orders')
            ;

        } else {
            $mailMessage
                ->error()
                ->line('Dados nulos recebidos.')
            ;
        }

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function sendNotification($data = null)
    {
        $user = new \App\User([
            'name'=>'Luciano',
            'phone_number'=>'5522988194655',
            'email'=>'luciano.bapo@gmail.com',
        ]);

        if (!is_null($data)) {
            $this->data = $data;
//            dd($this->data);
        }

        $user->notify($this);

//        try {
//
//
////            $database_host = config('database.connections.mysql.host');
////            $database_name = config('database.connections.mysql.database');
////            $database_user = config('database.connections.mysql.username');
////            $database_password = config('database.connections.mysql.password');
////
////            $connection = mysqli_connect($database_host,$database_user,$database_password,$database_name);
//
////            if ($err = mysqli_connect_errno()){
////                $msg = $err.': '.mysqli_connect_error ();
////                $user->notify(new \App\Notifications\DatabaseDown($msg));
////            } else {
////                $msg = 'no error occurred';
//////                    $user->notify(new \App\Notifications\DatabaseDown($msg));
////            }
//            $user->notify($this);
//        } catch (\Exception $e){
////            $msg = 'Erro: '.$e->getMessage();
//            $user->notify($this);
//        }

    }
}
