<?php

require ('Connection.php');

class Query 
{
    public function FetchAllFromProduct()
    {
        global $conn;

        $stmt = $conn->prepare("SELECT id, nombre, nombre_corto, descripcion, pvp, familia FROM productos");
        $stmt->execute(); 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function FetchAllFromFamily()
    {
        global $conn;

        $stmt = $conn->prepare("SELECT cod, nombre FROM familias");
        $stmt->execute(); 
        $families = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $families;
    }

    public function InsertProduct(string $name, string $shortName, string $description, float $price, string $family): array
    {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES (:nombre, :nombre_corto, :descripcion, :pvp, :familia)");
        $products = $stmt->execute([
            ':nombre'=>$name,
            ':nombre_corto'=>$shortName,
            ':descripcion'=>$description,
            ':pvp'=>$price,
            ':familia'=>$family      
        ]);
        
        // returns true if succesfull.
        return $products; 

    }
}

