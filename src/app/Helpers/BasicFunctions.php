<?php

namespace App\Helpers;

class BasicFunctions
{
    public static function getColor($variable)
    {
        $color_array = config('core_settings.colors');

        if ($color_array[$variable]) {
            return $color_array[$variable];
        }
        return '#'.substr(md5($variable), 0, 6);
    }
    public static function stripAccents($str)
    {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

    public static function division($a, $b)
    {
        if ($b === 0) {
            return 0;
        }

        return $a / $b;
    }
}
