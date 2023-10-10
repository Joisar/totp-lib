<?php

namespace Vendor\Portal\Strategies;

use Illuminate\Support\Facades\Config;

class HmacStrategy implements StrategyInterface
{
    public function totp($email, $time = 60, $digits = 6, $algorithm = 'sha1', $secret_key = null)
    {
        if ($secret_key == null) {
            $secret_key = Config::get('app.key');
        }
        $message = floor(time() / $time);
        $hash = hash_hmac($algorithm, pack('N', $message) . $email, $secret_key, true);
        $offset = ord(substr($hash, -1)) & 0x0F;
        $truncatedHash = substr($hash, $offset, 4);
        $truncatedHash = $truncatedHash & "\x7F\xFF\xFF\xFF";
        $code = unpack('N', $truncatedHash)[1] % 1000000;
        return str_pad($code, $digits, '0', STR_PAD_LEFT);
    }
}
