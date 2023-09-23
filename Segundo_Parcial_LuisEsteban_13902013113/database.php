<?php

//$server = '192.168.0.113';
//$username = 'tom';
//$password = 'Hola123.w';
//$database = 'colegio';

$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'TestDB';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Error en la conexion: ' . $e->getMessage());
}

?>