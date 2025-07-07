<?php

if (!function_exists('e_text')) {
    function e_text(string $value): string
    {
        $ciphering = "AES-128-CBC";
        $iv = '1111222233334444'; // 16 karakter = 128 bit
        $key = 'M@l1k';  // 16 karakter key, bisa pakai hash kalau mau lebih kuat
        $options = 0;

        $encrypted = openssl_encrypt($value, $ciphering, $key, $options, $iv);
        return $encrypted !== false ? bin2hex($encrypted) : '';
    }
}

if (!function_exists('d_text')) {
    function d_text(string $value): string
    {
        $ciphering = "AES-128-CBC";
        $iv = '1111222233334444';
        $key = 'M@l1k';
        $options = 0;

        if (ctype_xdigit($value) && strlen($value) % 2 == 0) {
            $decrypted = openssl_decrypt(hex2bin($value), $ciphering, $key, $options, $iv);
            return $decrypted !== false ? $decrypted : 'Decryption error';
        } else {
            return 'Decryption error';
        }
    }
}
