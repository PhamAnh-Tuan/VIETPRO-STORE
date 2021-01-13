<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class newOrder extends Notification
{
    protected $data;
    use Queueable;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->name = $data['name'];
        $this->address = $data['address'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->total = $data['total'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
public function toSlack($notifiable)
{

    return (new SlackMessage)
    
                ->content('Bạn có đơn hàng mới')
                ->attachment(function ($attachment) {
                    $attachment->title('Thông tin đơn hàng')
                               ->fields([
                                    'Tên khách hàng' => $this->name,
                                    'Giá trị đơn hang' => $this->total.'VND',
                                    'Địa chỉ khách hàng' => $this->address,
                                    'Email khách hàng' => $this->email,
                                    'SĐT khách hàng' => $this->phone,
                                ]);
                });
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
