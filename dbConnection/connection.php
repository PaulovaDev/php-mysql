<?php

$host = 'localhost';
$dbname = 'proyecto';
$username = 'gestor';
$password = 'secreto';
    
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuración de la conexión para utilizar excepciones con la extensión PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex) {
    
    die("No se pudo conectar a la base de datos $dbname :" . $ex->getMessage());
    
    // redireccionar a la página de error de bd -- borrar error & getmessage
}