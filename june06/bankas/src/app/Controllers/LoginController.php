<?php

use Bankas\App;
use Bankas\Messages as M;

class LoginController
{
    public function showLogin()
    {
        return App::view('login', ['messages' => M::get()]);
    }
    public function doLogin()
    {
        $users = json_decode(file_get_contents(App::APP . 'data/users.json'));
        foreach ($users as $user) {
            if ($_POST['name'] != $user->name) {
                continue;
            }
            if (md5($_POST['psw']) != $user->psw) {
                M::add('Labai Blogai 1', 'alert');
                return App::redirect('login');
            } else {
                M::add('Valio', 'success');
                return App::redirect('forma');
            }
        }
        M::add('Labai Blogai 2', 'alert');
        return App::redirect('login');
    }
    public function doLogout()
    {
        App::authRem();
        M::add('viso', 'success');
        return App::redirect('login');
    }
}
