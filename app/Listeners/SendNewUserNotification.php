<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use App\Models\User;
use App\Notifications\NewUserRegistered;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        // pag na very na yung user
        $verifiedUser = $event->user;

        // ma nonotif na yung admin na may gumawa na ng account
        $admins = User::where('role_as', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserRegistered($verifiedUser));
        }
    }
}
