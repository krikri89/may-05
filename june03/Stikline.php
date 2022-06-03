<?php

class Stikline
{
    public $turis;
    static public $gerimas = 'Pepsi';

    public static $valio;

    public function valio(){
        echo '<h1> Valio </h1>';
    }

    public function __construct()
    {
        $this->turis = rand(100, 200);
    }
    public function kas()
    {
        echo '<br-->' . self::$gerimas;
    }
}
