<?php

class Cart
{
    public $id;
    static private $cart;

    static public function create()
    {
        return self::$cart ?? self::$cart = new self;
    }

    public function __construct()
    {
        $this->id = rand(1000, 9999);
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }
    private function __sleep()
    {
        return [];
    }
}
