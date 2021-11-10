<?php

namespace App\Entity\StaticStorage;

class OrderStaticStorage
{
    public CONST ORDER_STATUS_CREATED = 0;
    public CONST ORDER_STATUS_PROCESSED = 1;
    public CONST ORDER_STATUS_COMPLETED = 2;
    public CONST ORDER_STATUS_DELIVERED = 3;
    public CONST ORDER_STATUS_DENIED = 4;

    /**
     * @return string[]
     */
    public static function getOrderStatusChoices(): array
    {
        return [
            self::ORDER_STATUS_CREATED => 'Created',
            self::ORDER_STATUS_PROCESSED => 'Processed',
            self::ORDER_STATUS_COMPLETED => 'Completed',
            self::ORDER_STATUS_DELIVERED => 'Delivered',
            self::ORDER_STATUS_DENIED => 'Denied'
        ];
    }
}
