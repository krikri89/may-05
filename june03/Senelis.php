<?php

namespace Super\Old;

class Senelis
{

    public static $posakis = 'Va va, Sakiau tau';

    public function __construct()
    {

        echo '<h3> Senelio Konstruktorius</h3>';
    }

    public function pasaka()
    {
        echo '<h3>' . self::$posakis . '</h3>';
        echo '<h3>' . static::$posakis . '</h3>';
    }
}
