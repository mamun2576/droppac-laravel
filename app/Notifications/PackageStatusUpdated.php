<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Update;

class PackageStatusUpdated extends Notification
{
    use Queueable;

    public $update;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Update $update)
    {
        $this->update = $update;
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
        
        if($this->update->status == 'courier_requested'){
            $message = 'We have received your request for a courier. See you soon!';
            $subject = 'Courier Requested by '.$this->update->package->user->first_name;
        }
        else{
            $message = 'The package by '.$this->update->package->shipper.' has been updated to '.preg_replace('/_/',' ',$this->update->status.'.');
          $subject = 'Package Update for '.$this->update->package->user->first_name;
        }
        
        return (new MailMessage)
                    ->subject($subject)
                    ->from('info@droppac.com', 'Drop Pac Logistics')
                    ->line($this->update->package->user->first_name.',')
                    ->line($message)
                    ->action('Click here to track your package', url('/admin/package/'.$this->update->package->id))
                    ->line('Thank you for choosing DPL!');
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
}
