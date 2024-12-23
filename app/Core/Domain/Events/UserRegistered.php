<?php

namespace App\Core\Domain\Events;
use Illuminate\Foundation\Events\Dispatchable;
use Carbon\Carbon;

class UserRegistered {
    use Dispatchable;

    public function __construct(
        public string $email,
        public string $name,
        public Carbon $createdAt,
    ){}

}