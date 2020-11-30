<?php

define('MYSQL_USER', 'projetcasino');
define('MYSQL_PASSWORD', '4teVnaYM6yuVuDWJ');
define('MYSQL_HOST', '5.196.243.43');
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