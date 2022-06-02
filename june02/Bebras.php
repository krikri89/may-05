<?php

class Bebras
{
    public $tail = 'Long';
    private $age = 23;
    private $name, $childrens;

    // public function __construct(string $n, array $c)
    // {
    //     echo '<br> magic construct <br>';

    //     $this->whatIsYourAge();
    //     $this->age = rand(10, 300);
    //     $this->whatIsYourAge();
    //     $this->name = $n;
    //     $this->childrens = $c;
    // }
    // public function __destruct()
    // {
    //     echo '<br> magic destruct <br>';
    // }
    // public function whatIsYourAge() // getter
    // {
    //     // echo '<br>' . (++$this->age) . '<br>';
    // }
    // public function changeAge(array $age) //setter
    // {
    //     if ($age[0] > 25) {
    //         return;
    //     }
    //     $this->age = $age[0];
    // }
    // public function __get($what)
    // {
    //     // echo '<br>Magic Get ' . $what . '<br>';
    //     // return 'Nieko nera namie';
    //     if (in_array($what, ['age', 'name'])) {
    //         // return $this->$what;
    //         return 'betkas';
    //     }
    // }
    // public function __set($where, $what)
    // {
    //     echo '<br>Magic SET' . $where . '' . $what . '<br>';
    // }
}
