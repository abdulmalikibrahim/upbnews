<?php

if (!function_exists('potongText')) {
    function potongText($text, $max = 20)
    {
        return (strlen($text) > $max) ? substr($text, 0, $max) . '...' : $text;
    }
}

if (!function_exists('hitungAngka')) {
    function hitungAngka($angka)
    {
        if($angka > 1000){
            return number_format($angka/1000,0,"",".")."k";
        }else{
            return $angka;
        }
    }
}
