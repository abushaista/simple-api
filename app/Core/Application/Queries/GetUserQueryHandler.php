<?php

namespace App\Core\Application\Queries;
use App\Core\Application\Queries\GetUserQuery;
use App\Core\Domain\Repositories\UserRepository;

class GetUserQueryHandler {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function handle(GetUserQuery $query){
        $data = $this->userRepository->GetUsers(
            $query->searchTerm,
            $query->page,
            $query->sortBy,
        );
        return $data;
    }
}