<?php


namespace App\Constants;


final class CeoRenewStatus
{
    const NOTACTION    = 0;
    const RENEW        = 1;
    const NOTRENEW     = 2;

    public static function getList()
    {
        return [
            self::NOTACTION    => "Not Action Yet",
            self::RENEW        => "Renew",
            self::NOTRENEW     => "Not Renew",
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : "";
    }
}
