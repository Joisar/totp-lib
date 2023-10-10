<?php

namespace Joisar\Totp\Strategies;

interface StrategyInterface
{
    public function totp($email, $time = 60, $digits = 6, $algorithm = 'sha1', $secret_key = null);
}
