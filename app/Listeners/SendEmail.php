<?php

namespace App\Listeners;

use App\Events\EmailEvent;
use App\Events\Notification;
use App\Helpers\PostMan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmail
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  App\Events\EmailEvent  $event
     * @return void
     */
    public function handle(EmailEvent $event)
    {
        $data = $event->data;
        PostMan::sendEmailUsingMaster('mails.plain', $data['info'], $event->template, $data['content']);
    }
}
