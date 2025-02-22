<?php

namespace App\Actions;

use App\Models\User;

class CreateUserAction
{
    /**
     * Create a new class instance.
     */
    public function execute(array $data): User
    {
        return User::create($data);
    }
}
