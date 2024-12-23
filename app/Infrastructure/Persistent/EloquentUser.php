<?php

namespace App\Infrastructure\Persistent;
use App\Core\Domain\Repositories\UserRepository;
use App\Models\User as UserModel;
use App\Core\Domain\Entities\User;

class EloquentUser implements UserRepository {
    public function Save(User $user): User {
        $result = UserModel::Create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ]);
        $user->id = $result->id;
        $user->createdAt = $result->created_at;
        return $user;
    }
}