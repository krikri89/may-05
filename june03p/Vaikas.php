<?php

namespace Meska;


class  Vaikas
{
    public static $posakis = 'Bla bla';

    public function __construct()
    {
        // parent::__construct();
        echo '<h3> Vaiko konstructor</h3>';
    }
    public function betvarke()
    {
        echo '<h3> Visiska betvarke</h3>';
    }
    public function pasaka()
    {
        echo '<h3> Tic_tok</h3>';
        // echo '<h3>' . $this->posakis . '</h3>';
        // echo '<h3>' . self::$posakis . '</h3>';
        // echo '<h3>' . static::$posakis . '</h3>';
    }
}
