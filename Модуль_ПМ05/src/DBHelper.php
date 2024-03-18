<?php

class DBHelper
{
    public static function string(string $string): string
    {
        return "'" . $string . "'";
    }
}