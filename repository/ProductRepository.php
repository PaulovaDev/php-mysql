<?php

require('../connection.php');

class ProductRepository
{

    public function FetchAllFromProduct()
    {
        global $conn;

        $stmt = $conn->prepare("SELECT id, nombre, nombre_corto, descripcion, pvp, familia FROM Productos");
        $stmt->execute(); 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

}

// Test de la función FetchAllFromProduct()
$fetch = new ProductRepository();
$fetch->FetchAllFromProduct();
echo '<pre>';
var_dump($fetch->FetchAllFromProduct());