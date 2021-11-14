<?php

namespace App\Entity\StaticStorage;

class UserStaticStorage
{
    public CONST USER_ROLE_USER = 'ROLE_USER';
    public CONST USER_ROLE_ADMIN = 'ROLE_USER';

    /**
     * @return string[]
     */
    public static function getUserRolesChoices(): array
    {
        return [
            self::USER_ROLE_ADMIN => 'Admin'
        ];
    }
}
