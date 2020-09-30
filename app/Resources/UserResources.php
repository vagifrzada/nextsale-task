<?php

namespace App\Resources;

use App\Entities\User;

/**
 * Class UserResources
 * @package App\Resources
 */
class UserResources
{
    private array $users;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function getData(): array
    {
        return array_map(fn (User $user) => $this->getFormat($user), $this->users);
    }

    private function getFormat(User $user): array
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
        ];
    }
}