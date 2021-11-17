<?php

namespace App\Entity\StaticStorage;

class UserStaticStorage
{
    public CONST USER_ROLE_USER = 'ROLE_USER';
    public CONST USER_ROLE_ADMIN = 'ROLE_ADMIN';
    public CONST USER_ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

    /**
     * @return string[]
     */
    public static function getUserRolesChoices(): array
    {
        return [
            self::USER_ROLE_USER => 'User',
            self::USER_ROLE_ADMIN => 'Admin',
            self::USER_ROLE_SUPER_ADMIN => 'Super Admin'
        ];
    }
}
