<?php

namespace App\Repositories\Interfaces;

use App\Entities\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
    public function all(): array;
    public function store(User $user): User;
}