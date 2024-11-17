<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "projeto";
$conexao = mysqli_connect($hostname, $user, $password, $database);

if (!$conexao) {
    print "Falhou";
}

?>