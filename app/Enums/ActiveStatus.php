<?php

namespace App\Enums;

final class ActiveStatus
{
    public const ACTIVE = 1;

    public const INACTIVE = 0;

    public static function getDescription($value): string
    {
        if ($value === self::ACTIVE) {
            return __('Kích hoạt');
        }

        return __('Không kích hoạt');
    }
}
