<?php

namespace App\Resources;

use App\Entities\User;

/**
 * Class UserResource
 * @package App\Resource
 */
class UserResource
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getData(): array
    {
        return $this->getFormat($this->user);
    }

    private function getFormat(User $user): array
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
        ];
    }
}