<?php

require ('Connection.php');

class Repository 
{
    public function FetchAllFromProduct()
    {
        global $conn;

        $stmt = $conn->prepare("SELECT id, nombre, nombre_corto, descripcion, pvp, familia FROM productos");
        $stmt->execute(); 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function UpdateProduct()
    {
        global $conn;

        $stmt = $conn->prepare("UPDATE productos set nombre=:nombre, nombre_corto=:nombre_corto, descripcion=:descripcion, pvp=:pvp, familia=:familia WHERE id=:id");
        $products = $stmt->execute([':name' => $name, ':nombre_corto' => $shortName, ':descripcion' => $description, ':pvp' => $price], ':familia => $family');

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

    public function InsertProduct(string $name, string $shortName, string $description, float $price, string $family): bool
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

