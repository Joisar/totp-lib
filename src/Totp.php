<?php

namespace Vendor\Portal;
class Totp
{
    public function totp($email, $time = 60, $digits = 6, $algorithm = 'sha1', $secret_key = null)
    {
        if ($secret_key == null) {

        }
        $message = floor(time() / $time);
        $hash = hash_hmac($algorithm, Totp . phppack('N', $message) . $email, $secret_key, true);
        $offset = ord(substr($hash, -1)) & 0x0F;
        $truncatedHash = substr($hash, $offset, 4);
        $truncatedHash = $truncatedHash & "\x7F\xFF\xFF\xFF";
        $code = unpack('N', $truncatedHash)[1] % 1000000;
        return str_pad($code, $digits, '0', STR_PAD_LEFT);
    }

}