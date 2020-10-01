<?php

namespace App\Repositories;

use App\Entities\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserCsvRepository
 * @package App\Repositories\UserCsvRepository
 */
class UserCsvRepository implements UserRepositoryInterface
{
    public function all(): array
    {
        $users = [];
        foreach (file(BASE_PATH . '/storage/users.csv') as $line) {
            $item = explode(';', str_getcsv($line)[0]);
            $users[] = new User((int) $item[0], $item[1]);
        }
        return $users;
    }

    public function store(User $user): User
    {
        $data = PHP_EOL . $user->getId() . ';' . $user->getName();
        file_put_contents(BASE_PATH . '/storage/users.csv', $data, FILE_APPEND);
        return $user;
    }
}