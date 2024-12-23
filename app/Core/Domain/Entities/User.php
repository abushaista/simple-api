<?php

namespace App\Core\Domain\Entities;
use App\Core\Domain\Events\UserRegistered;
use Carbon\Carbon;

class User {
    public int $id;
    public Carbon $createdAt;
    private array $domainEvents = [];
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ){
        $this->recordDomainEvent(new UserRegistered($this->email, $this->name, Carbon::now()));
    }

    public function recordDomainEvent(object $event): void
    {
        $this->domainEvents[] = $event;
    }

    public function releaseDomainEvents(): array
    {
        $events = $this->domainEvents;
        $this->domainEvents = [];
        return $events;
    }
}
