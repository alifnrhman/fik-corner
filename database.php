<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'fik_corner';

$connection = new mysqli($host, $user, $pass, $db_name);

if ($connection->connect_error) {
    die("Koneksi error: " . $connection->connect_error);
}