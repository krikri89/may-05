<!-- Sukurti klasę Kibiras1. Sukurti protected savybę akmenuKiekis. Parašyti šiai savybei metodus prideti1Akmeni() pridetiDaugAkmenu($kiekis) ir metodą kiekPririnktaAkmenu(). Sukurti kibiro objektą ir pademonstruoti akmenų rinkimą į kibirą ir rezultatų išvedimą.
 -->
<?php
class Kibiras1
{
    private $akmenuKiekis;

    public function prideti1Akmeni()
    {
        // echo '<br>' . $this->akmenuKiekis . '<br>';
        echo '<br' . (++$this->akmenuKiekis) . '<br>';
    }
    public function pridetiDaugAkmenu(int $kiekis)
    {
        echo '<br>' . $this->akmenuKiekis = $kiekis . '<br>';
    }
}
