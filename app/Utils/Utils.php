<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:49 AM
 */

namespace App\Utils;

/**
 * Class Utils
 *
 * @package App\Utils
 */
class Utils
{
    public static function extractFirstCharsFromString(string $string, int $length)
    {
        return mb_substr($string, 0, $length);
    }
}
