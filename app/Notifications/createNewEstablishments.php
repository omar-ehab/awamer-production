<?php

namespace App\Notifications;

use App\Establishment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class createNewEstablishments extends Notification
{
    private $name, $mobile, $created_at , $establishment_id;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param Establishment $establishment
     */
    public function __construct(Establishment $establishment)
    {
        $this->establishment_id = $establishment['id'];
        $this->name = $establishment['name'];
        $this->mobile = $establishment['mobile'];
        $this->created_at = $establishment['created_at'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'establishment_id'=>$this->establishment_id,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'created_at' => $this->created_at
        ];
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
