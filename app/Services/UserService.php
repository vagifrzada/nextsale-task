<?php

namespace App\Services;

use App\Entities\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(int $id, string $name): User
    {
        return $this->userRepository->store(new User($id, $name));
    }
}