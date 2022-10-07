<?php

namespace App\Listeners;

use App\Events\LivroCriado;
use App\Mail\LivroMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailLivroCriado
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
    public function handle(LivroCriado $event)
    {
        $userList = User::all();
        foreach ($userList as $index => $user){
            $email = new LivroMail(
                $event->titulo,
                $event->nome
            );
            $when = now()->addSeconds($index * 2);
            Mail::to($user)->later($when, $email);
            //sleep(2);
        }
    }
}
