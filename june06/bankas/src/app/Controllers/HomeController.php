<?php

namespace Bankas\Controllers;

use Bankas\App;

class HomeController
{
    public function index()
    {
        $list = [];
        for ($i = 0; $i < 10; $i++) {
            $list[] = rand(1000, 9999);
        }
        return App::view('home', ['title' => 'Alabama']);
    }
    public function form()
    {
        return App::view('form', ['messages' => M::get()]);
    }
    public function doform()
    {
        M::add('Puiku', 'alert');
        M::add($_POST['alabama'], 'success');
        return App::redirect('forma');
    }
}
