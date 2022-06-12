<?php

$users = [
    ['id' => 1, 'name' => 'bebras', 'psw' => md5('123'), 'full_name' => 'Bebras Upinis'],
    ['id' => 2, 'name' => 'lina', 'psw' => md5('123'), 'full_name' => 'Lina Linovaite'],
    ['id' => 3, 'name' => 'petras', 'psw' => md5('123'), 'full_name' => 'Peter Johnson']
];

file_put_contents(__DIR__ . '/users.json', json_encode(($users))); // seeder
