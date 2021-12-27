<?php

require('../connection.php');

class ShopRepository
{    
    public function FetchAllFromShop()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT id, nombre, tlf FROM Tiendas");
        $stmt->execute(); 
        $shops = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $shops;
    }
}

// Test de la función FetchAllFromShop()
$fetch = new ShopRepository();
$fetch->FetchAllFromShop();
echo '<pre>';
var_dump($fetch->FetchAllFromShop());