<?php

namespace Meska;

use Super\Old\Senelis;

class Tevas extends Senelis
{
    public function __construct()
    {
        echo '<h3> Tevo konstructor</h3>';
    }

    public function tvarka()
    {
        echo '<h3> Daro tvarka</h3>';
        // echo '<h3> ' . $this->posakis . '</h3>';
    }
}
