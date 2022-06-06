<!-- (STATIC) Sukurti klasę Tenisininkas. Klasė Tenisininkas turi privačią savybę vardas, privačią savybę kamuoliukas (true jei turi ir false jei ne) privačią static savybę zaidejas1, privačią static savybę zaidejas2 (žaidėjų objektams saugoti) Klasė turi tokius metodus: -->
<!-- A. Public arTuriKamuoliuka(); -->
<!-- B. Public perduotiKamuoliuka() Perduoda kamuoliuką kitam Tenisininkas objektui; -->
<!-- C. Public static zaidimoPradzia() Perduoda kamuoliuką atsitiktiniam žaidėjo objektui;
Sukurti du Tenisininkas objektus. Kamuoliuko neturi nei vienas. Iškviesti statinį metodą zaidimoPradzia() ir kažkuriam žaidėjui priskirti kamuoliuką. Žaidėjo objekto metodu perduotiKamuoliuka() perduoti kamuoliuką kitam žaidėjui ir grąžinti atgal iš kito žaidėjo objekto. -->

<?php

class Tenisininkas
{
    private $vardas;
    private $kamuoliukas;
    private static $zaidejas1;
    private static $zaidejas2;

    public static function zaidimoPradzia()
    {
        if (null === self::$zaidejas1 || null === self::$zaidejas2) {
            echo 'nesusirinko pakankamai zaideju';
        }
        self::$zaidejas1->kamuoliukas = (bool)rand(0, 1);
        self::$zaidejas2->kamuoliukas = !self::$zaidejas1->kamuoliukas;
    }
    public function __construct($name)
    {
        $this->name = $name;
        if (null === self::$zaidejas1) {
            self::$zaidejas1 = $this;
        } elseif (null === self::$zaidejas2) {
            self::$zaidejas2 = $this;
        }
    }
    public function arTuriKamuoliuka()
    {
        return $this->kamuoliukas;
    }
    public function perduotiKamuoliuka()
    {
        if (!$this->arTuriKamuoliuka) {
            echo '<h3>' . $this->name . ' Neturi kamuoliuko</h3>';
        } else {
            if (self::$zaidejas1->arTuriKamuoliuka()) {
                self::$zaidejas2->kamuoliukas = true;
                $this->kamuoliukas = false;
                echo '<h3>Kamuoliukas perduotas</h3>';
            } else {
                self::$zaidejas1->kamuoliukas = true;
                $this->kamuoliukas = false;
                echo '<h3>Kamuoliukas perduotas</h3>';
            }
        }
    }
}
