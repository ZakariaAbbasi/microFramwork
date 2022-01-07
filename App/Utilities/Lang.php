<?php
namespace App\Utilities;

class Lang
{
    private static $fa_num = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    private static $en_num = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    public static function persian_numbers(string $input)
    {
         return str_replace(self::$en_num, self::$fa_num, $input);
    }

    public static function latin_numbers(string $input)
    {
         return str_replace(self::$fa_num, self::$en_num, $input);
    }
}