<?php 
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro';

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    // if ($mysqli->connect_errno) {
    //     echo 'Falha na conexão';
    // } else {
    //     echo 'Conexão concluida';
    // }
?>