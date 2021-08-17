<?php

namespace App\Handle;

class ImageHandle
{
    public static function imageFirst($string) {
        return preg_split("/\r\n|\n|\r/", $string)[0] ?? '';
    }
    public static function images($string) {
        return preg_split("/\r\n|\n|\r/", $string) ?? [];
    }
}
