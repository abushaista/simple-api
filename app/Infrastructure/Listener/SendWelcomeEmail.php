<?php

namespace App\Infrastructure\Listener;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue {

    public function handle(UserRegistered $event): void {

    }
}