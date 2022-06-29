<?php

class Radio1 extends Radio2 implements Planas, PapildomasPlanas
{
    public function goForIt(array $data): array
    {
        echo self::TU;
        return [];
    }
    public function jaJa(int $data): void
    {
    }
}
