<?php

define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '6W9=>');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'projetcasino');


$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

try {
    $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD, $pdoOptions);
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
?>