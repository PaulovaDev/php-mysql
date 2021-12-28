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

// 
// class Connection
// {
//     public string $host = 'localhost';
//     public string $dbname = 'proyecto';
//     public string $username = 'gestor';
//     public string $password = 'secreto';
    
//     public function databaseConnection(string $host, string $dbname, string $username, string $password){
//         try {
//             $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//             echo "Connected to $dbname at $host successfully.";
//         } catch (PDOException $pe) {
//             die("Could not connect to the database $dbname :" . $pe->getMessage());
//         }
//     }
// }

// $conn = new Connection();
// $conn->databaseConnection($conn->host, $conn->dbname, $conn->username, $conn->password);
// 