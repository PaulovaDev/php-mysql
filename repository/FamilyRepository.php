<?php

require('../connection.php');

class FamilyRepository
{

    public function FetchAllFromFamily()
    {
        global $conn;

        $stmt = $conn->prepare("SELECT cod, nombre FROM Familias");
        $stmt->execute(); 

        $families = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $families;
    }

}

// Test de la función FetchAllFromFamily()
$fetch = new FamilyRepository();
$fetch->FetchAllFromFamily();
echo '<pre>';
var_dump($fetch->FetchAllFromFamily());