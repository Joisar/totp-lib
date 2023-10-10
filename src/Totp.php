<?php

namespace Vendor\Portal;

use Illuminate\Support\Facades\Config;
use Vendor\Portal\Strategies\StrategyInterface;

class Totp
{
    private $strategy;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function loginViaOtp($email, $otp): bool
    {
        $totp = $this->strategy->totp($email);
        $status = false;
        if ($totp == $otp) {
            $status = true;
        }
        return $status;
    }
}
