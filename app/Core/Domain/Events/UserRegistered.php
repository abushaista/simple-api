<?php

namespace App\Core\Domain\Events;
use Illuminate\Foundation\Events\Dispatchable;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;

class UserRegistered {
    use Dispatchable, SerializesModels;

    public function __construct(
        public string $email,
        public string $name,
        public Carbon $createdAt,
    ){}

}