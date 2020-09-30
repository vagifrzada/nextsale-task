<?php

namespace App\Repositories;

use App\Entities\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    public function all(): array
    {
        return [
            new User(1, 'Bob'),
            new User(2, 'Frank'),
            new User(3, 'John'),
            new User(4, 'Jack'),
        ];
    }

    public function store(User $user): User
    {
        // save to storage.
        return $user;
    }
}