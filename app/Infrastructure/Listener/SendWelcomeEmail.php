<?php

namespace App\Infrastructure\Listener;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Core\Domain\Events\UserRegistered;
use App\Mail\AdminNotification;


class SendWelcomeEmail {

    public function handle(UserRegistered $event): void {
        Mail::to($event->email)->send(new WelcomeEmail($event));
        Mail::to($event->email)->send(new AdminNotification($event));
    }
}