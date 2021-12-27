<?php

require('../connection.php');

class StockRepository
{
    public function FetchAllFromStock()
    {
        global $conn;

        $stmt = $conn->prepare("SELECT producto, tienda, unidades FROM Stocks");
        $stmt->execute(); 
        $stocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $stocks;
    }
}

// Test de la función FetchAllFromStock()
$fetch = new StockRepository();
$fetch->FetchAllFromStock();
echo '<pre>';
var_dump($fetch->FetchAllFromStock());