<?php

namespace App\Domain\Model;

class Jeedom
{
    public static function GetURL(): string {
        return $_SERVER['JEEDOM_URL'];
    }
    public static function GetAPIKEY(): string {
        return $_SERVER['JEEDOM_APIKEY'];
    }
}
