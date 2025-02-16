<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotificationPublicManager extends Notification
{
    use Queueable;

    public $manager_name;
    public $manager_id;
    public $company_name;
    public $company_id;
    public $payment_id;
    public $amount;
    public $type;
    public $notes;
    public function __construct($manager_name, $manager_id, $company_name, $company_id, $payment_id, $amount, $type, $notes)
    {
        $this->manager_name = $manager_name;
        $this->manager_id = $manager_id;
        $this->company_name = $company_name;
        $this->company_id = $company_id;
        $this->payment_id = $payment_id;
        $this->amount = $amount;
        $this->type = $type;
        $this->notes = $notes;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'notification_id' => $this->id,
            'manager_name' => $this->manager_name,
            'manager_id' => $this->manager_id,
            'company_name' => $this->company_name,
            'company_id' => $this->company_id,
            'payment_id' => $this->payment_id,
            'amount' => $this->amount,
            'type' => $this->type,
            'notes' => $this->notes

        ];
    }

}
