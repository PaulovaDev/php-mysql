<?php

require ('../Repository.php');

$repository = new Repository();

if (isset($_POST["nombre"], $_POST["nombre_corto"], $_POST["descripcion"], $_POST["pvp"], $_POST["familia"])) {

    $name = $_POST["nombre"];
    $shortName = $_POST["nombre_corto"];
    $description = $_POST["descripcion"];
    $price = $_POST["pvp"];
    $family = $_POST["familia"];

    $create = $repository->InsertProduct($name, $shortName, $description, $price, $family);
}  

header("Location: crear.php");