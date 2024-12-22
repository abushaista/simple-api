<?php

namespace App\Infrastructure\Persistent;
use App\Core\Domain\Repositories\UserRepository;
use App\Models\User as UserModel;

class EloquentUser implements UserRepository {
    public function Save(User $user): User {
        $result = UserModel::Create([
            $user->name,
            $user->email,
            $user->password,
        ]);
        $user->id = $result->id;
        $user->createdAt = $result->created_at;
        return $user;
    }
}