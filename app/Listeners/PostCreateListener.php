<?php

namespace App\Listeners;

use App\Mail\StoredPost;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreateListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreateEvent $event)
    {
        Mail::to('kokoaung2019aungaung@gmail.com')->send(new StoredPost($event->post));
    }
}
