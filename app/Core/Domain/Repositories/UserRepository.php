<?php

namespace App\Core\Domain\Repositories;
use App\Core\Domain\Entities\User;

interface UserRepository {
    public function Save(User $user): User;
    public function GetUsers(string $term, int $page, string $sortBy) : array;
}