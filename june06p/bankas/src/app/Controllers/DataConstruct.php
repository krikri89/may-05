<?php

namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Messages as M;

class DataController
{
    private $data, $file;
    public function __construct($file)
    {
        $this->file = $file;
        if (!file_exists(__DIR__ . '/data/' . $file . '.json')) {
            file_put_contents(__DIR__ . '/data' . $file . '.json', json_encode([]));
            file_put_contents(__DIR__ . '/data/' . $file . '_id.json', 0);
        }
        $this->data = json_decode(file_get_contents(__DIR__ . '/data/' . $file . '.json'), 1);
    }
    public function __destruct()
    {
        file_put_contents(__DIR__ . '/data/' . $this->file . '.json', json_encode($this->data));
    }
    private function getId()
    {
        $id = (int) file_get_contents(__DIR__ . '/data/' . $this->file . '_id.json'); // gaunam id
        $id++; // padidinam vienetu 
        file_put_contents(__DIR__ . '/data/' . $this->file . '_id.json', $id); // sudedam atgal i file 
        return $id;
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
    public function show(int $id): array
    {
        foreach ($this->data as $data) {
            if ($data['id'] == $id) {
                return $data;
            }
        }
        return [];
    }
    public function delete(int $id): void
    {
        foreach ($this->data as $key => $data) { //jeigu key =data, trinam abu
            if ($data['id'] == $id) {
                unset($this->data[$key]);
                break; //kad nesisuktu tuscias
            }
        }
    }
    public function update(int $id, array $data): void
    {
        foreach ($this->data as $key => $value) { //susirandam kaip ir norint delete tik key pakeiciam i kita pavadinima kad nesimaisytu su delete methodu
            if ($value['id'] == $id) {
                $this->data[$key] = $data;
                break;
            }
        }
    }
}
