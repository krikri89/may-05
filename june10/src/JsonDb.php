<?php

namespace App\DB;

use App\DB\DataBase;

class JsonDb implements DataBase
{
    private $data, $file;
    public function __construct($file)
    {
        $this->file = $file;
        if (!file_exists(__DIR__ . '/data/' . $file . '.json')) { // jeigu file nera
            file_put_contents(__DIR__ . '/data/' . $file . '.json', json_encode([])); //ji sukuriam ir dedam i tuscia masyva
            file_put_contents(__DIR__ . '/data/' . $file . '_id.json', 0); //ji sukuriam kita file su id generatorium pradedant skaiciuoti  nuo 0
        }
        $this->data = json_decode(file_get_contents(__DIR__ . '/data/' . $file . '.json'), 1); //nuskaitome file get contents ir uzkoduojame i masyva
    }
    public function __destruct() // uzsaugo file
    {
        file_put_contents(__DIR__ . '/data/' . $this->file . '.json', json_encode($this->data));
    }
    private function getId() //papildomas method. Id kurimas 
    {
        $id = (int) file_get_contents(__DIR__ . '/data/' . $this->file . '_id.json'); // gaunam id
        $id++; // padidinam vienetu 
        file_put_contents(__DIR__ . '/data/' . $this->file . '_id.json', $id); // sudedam atgal i file 
        return $id; //graziname nauja id
    }
    public function create(array $data): void  //duomenis gaunam
    {
        $data['id'] = $this->getId(); //apdorojam duomenis
        $this->data[] = $data; // data idedam i masyva
    }
    public function showAll(): array
    {
        return $this->data;
    }
    function show(int $id): array
    {
        foreach ($this->data as $data) {
            if ($data['id'] == $id) {
                return $data;
            }
        }
        return [];
    }
}
