<?php

$host = 'localhost';
$dbname = 'proyecto';
$username = 'gestor';
$password = 'secreto';
    
try {
    //Hacemos la conexión con la base de datos:
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configuración de la conexión para utilizar excepciones con la extensión PDO:
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex) {
    // Si hubiera un error en la ejecución del código anterior,
    // se ejecutaría lo siguiente:
    die("No se pudo conectar a la base de datos $dbname :" . $ex->getMessage());
    
}