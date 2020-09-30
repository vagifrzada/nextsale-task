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
        $handle = fopen(BASE_PATH . '/storage/users.csv', "r");
        $users = [];
        for ($i = 0; $row = fgetcsv($handle ); ++$i) {
            $data = explode(';', $row[0]);
            $users[] = new User((int) $data[0], $data[1]);
        }
        fclose($handle);
        return $users;
    }

    public function store(User $user): User
    {
        $data = PHP_EOL . $user->getId() . ';' . $user->getName();
        file_put_contents(BASE_PATH . '/storage/users.csv', $data, FILE_APPEND);
        return $user;
    }
}