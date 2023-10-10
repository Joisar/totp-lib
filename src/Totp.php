<?php

namespace Joisar\Totp;

use Joisar\Totp\Strategies\HmacStrategy;

class Totp
{
    public static function currentStrategy()
    {
        $strategy = new HmacStrategy();
        return $strategy;
    }

    public static function loginViaOtp($email, $otp): bool
    {
        $strategy = self::currentStrategy();
        $totp = $strategy->totp($email);
        $status = false;
        if ($totp == $otp) {
            $status = true;
        }
        return $status;
    }
}
