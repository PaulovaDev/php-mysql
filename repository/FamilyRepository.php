<?php

require('../Connection.php');

class FamilyRepository
{

    public function FetchAllFromFamily(): array
    {
        global $conn;

        $stmt = $conn->prepare("SELECT cod, nombre FROM familias");
        $stmt->execute(); 

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function InsertInFamily(string $code, string $name): array
    {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO familias (cod, nombre) VALUES (:cod, :nombre)");
        $stmt->execute([ ':cod'=>$code, ':nombre'=>$name]);
    }

    public function UpdateFamily(string $code, string $name): array
    {
        
        $stmt = $conn->prepare("UPDATE familias SET cod = ':cod', nombre = ':nombre' WHERE cod = ':cod', nombre = ':nombre'");

    }

}


// Test de la función FetchAllFromFamily()
$fetch = new FamilyRepository();
$fetch->FetchAllFromFamily();
echo '<pre>';
var_dump($fetch->FetchAllFromFamily());

// Test de la función InsertInFamily()
$insert = new FamilyRepository();
$insert->InsertInFamily('test1', 'test2');

// Test de la función UpdateFamily()
$update = new FamilyRepository();


