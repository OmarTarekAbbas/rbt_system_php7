<?php


namespace App\Constants;


final class FullApproveStatus
{
    const APPROVE    = 1;
    const DISAPPROVE = 0;

    public static function getList()
    {
        return [
            self::APPROVE    => "Approve",
            self::DISAPPROVE => "Not Approve",
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
