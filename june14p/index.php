<?php
class Ciao
{
    use sayBye;
    public function sayyyHello()
    {
        echo 'Hello <br>';
    }
}

trait SayBye
{

    public function SayBye()
    {
        echo 'Bye bye <br>';
    }
}

trait SayJa
{
    public function sayJa()
    {
        echo 'Ja-ja-ja <br>';
    }
}


$k = new Ciao;
$k->sayyyHello();
$k->SayBye();



trait SayBay
{
    public function sayBay()
    {
        echo 'atettttt <br>';
    }
}

class Base
{
    use SayBay, SayJa;
    public function sayHello()
    {
        echo 'Hello <br>';
    }
}

trait HelloK
{
    public function sayHello()
    {
        echo 'Hello, Kitty <br>';
    }
}

trait HelloR
{
    public function sayHello()
    {
        echo 'Hello, Racoon <br>';
    }
}


class MyHelloWorld extends Base
{
    use HelloK, HelloR {
        HelloR::sayHello insteadof HelloK;
        HelloK::sayHello as sayHelloKitty;
    }
}
$o = new MyHelloWorld();
$o = new MyHelloWorld;
$o->sayHello();
$o->sayHelloKitty();
