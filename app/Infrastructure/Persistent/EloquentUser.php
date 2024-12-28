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

    public function GetUsers(?string $term, int $page, string $sortBy) : array {
        $query = UserModel::withCount('orders')->where('active', true);
        if($term) {
            $query->where('name', 'like', "%{$term}%")
                ->orWhere('email', 'like', "%{$term}%");
        }
        $query->orderBy($sortBy);
        $query->skip(($page-1)*10)->take(10);
        
        return $query->get()->toArray();
    }
}