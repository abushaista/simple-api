<?php

namespace App\Core\Application\Commands;
use App\Core\Domain\Entities\User;
use App\Core\Domain\Repositories\UserRepository;
use Illuminate\Support\Facades\Event;

class CreateUserCommandHandler {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserCommand $command) {
        $user = new User($command->name, $command->email, $command->password);
        $result = $this->userRepository->Save($user);
        foreach($result->releaseDomainEvents() as $event) {
            event::dispatch($event);
        }
        unset($result->password);
        return $result;
    }
}