<?php

$host = 'localhost';
$dbname = 'proyecto';
$username = 'gestor';
$password = 'secreto';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}