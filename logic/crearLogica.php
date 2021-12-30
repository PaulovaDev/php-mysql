<?php

require ('../repository/Repository.php');

$repository = new Repository();

if (isset($_POST["nombre"], $_POST["nombre_corto"], $_POST["descripcion"], $_POST["pvp"], $_POST["familia"])) {

    if (is_string($_POST["nombre"]) && is_string($_POST["nombre_corto"]) && is_string($_POST["descripcion"]) && is_numeric($_POST["pvp"]) && is_string($_POST["familia"])) {
        $name = $_POST["nombre"];
        $shortName = $_POST["nombre_corto"];
        $description = $_POST["descripcion"];
        $price = $_POST["pvp"];
        $family = $_POST["familia"];

        $create = $repository->InsertProduct($name, $shortName, $description, $price, $family);

        header("Location: ../view/listado.php");

    } else {
        header("Location: ../view/errorCrear.php");
    }
}