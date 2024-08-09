<?php

namespace app\helpers;

class DumpHelper
{
    public static function varDump($value, $name = '')
    {
        echo "<pre>{$name}-----------" . var_export($value, true) . '</pre>';
    }
}