<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:OPTIONS, GET, POST, DELETE, PUT');
header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");


if ($_GET['url'] == 'home') {

    if ('blabla-bebras' ==  apache_request_headers()['Authorization']) {

        echo json_encode([
            'Daiktas Nr. 32',
            'Puodas',
            'Dviratukas',
            'Zuikis',
            'Vazonas ir Lentyna',
            'IKEA'
        ]);
        die();
    } else {
        echo json_encode([]);
    }
}
