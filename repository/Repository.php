<?php

require ('../dbConnection/connection.php');

class Repository 
{
    public function FetchDataFromProduct(int $id)
    {
        // Se declara la variable $conn como global para que pueda ser utilizada en la propia función:
        global $conn;

        // Se utiliza el tilizar el método prepare de la clase PDO, que devolverá un objeto de la clase PDOStatement.
        $stmt = $conn->prepare(
            "SELECT id, nombre, nombre_corto, descripcion, pvp, familia FROM productos WHERE id=:id"
        );
        
        try {
            // Una vez que se ha preparado la consulta (líneas 13, 14 y 15 del código), la ejecutamos utilizando el método execute.
            $stmt->execute([':id' => $id]); 
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            // Si hubiera un error en la ejecución del código anterior,
            // se cerraría la conexión y se mostraría el mesaje de error.
            $conn = null;
            echo "Lo sentimos, ha habido un error de conexión con la base de datos.";
        }

        return $product;
    }

    public function FetchIdAndNameFromProduct()
    {
        global $conn;

        $stmt = $conn->prepare(
            "SELECT id, nombre FROM productos"
        );

        try {
            $stmt->execute(); 
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            $conn = null;
            echo "Lo sentimos, ha habido un error de conexión con la base de datos.";
        }

        return $products;
    }

    public function UpdateProduct(string $name, string $shortName, string $description, float $price, string $family, int $id)
    {
        global $conn;

        $stmt = $conn->prepare(
            "UPDATE productos SET nombre=:nombre, nombre_corto=:nombre_corto, descripcion=:descripcion, pvp=:pvp, familia=:familia WHERE id=:id"
        );
        
        try {
            $products = $stmt->execute([
                ':nombre' => $name,
                ':nombre_corto' => $shortName,
                ':descripcion' => $description,
                ':pvp' => $price,
                ':familia' => $family,
                ':id' => $id
            ]);
        } catch (PDOException $ex) {
            $conn = null;
            echo "Lo sentimos, ha habido un error de conexión con la base de datos.";
        }

        return $products;
    }

    public function FetchAllFromFamily()
    {
        global $conn;

        $stmt = $conn->prepare(
            "SELECT cod, nombre FROM familias"
        );

        try {
            $stmt->execute(); 
            $families = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            $conn = null;
            echo "Lo sentimos, ha habido un error de conexión con la base de datos.";
        }

        return $families;
    }

    public function InsertProduct(string $name, string $shortName, string $description, float $price, string $family): bool
    {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia)
            VALUES (:nombre, :nombre_corto, :descripcion, :pvp, :familia)"
        );

        try {
            $products = $stmt->execute([
                ':nombre'=>$name,
                ':nombre_corto'=>$shortName,
                ':descripcion'=>$description,
                ':pvp'=>$price,
                ':familia'=>$family
            ]);
        } catch (PDOException $ex) {
            $conn = null;
            echo "Lo sentimos, ha habido un error de conexión con la base de datos.";
        }
        
        return $products;
    }

    public function DeleteProduct(int $id)
    {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM productos WHERE id=:id");
        
        try {
            $stmt->execute([':id' => $id]); 
            
        } catch (PDOException $ex) {
            $conn = null;
            echo "Lo sentimos, ha habido un error de conexión con la base de datos.";
        }
    }
}

