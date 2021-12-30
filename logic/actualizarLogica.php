<?php

require ('../repository/Repository.php');

$id = $_POST['id'];

if ((isset($id)) == false) {
    header('Location: ../view/listado.php');
}

$repository = new Repository();

if (isset($_POST["Modificar"])) {

    if (is_string($_POST["nombre"]) && is_string($_POST["nombre_corto"]) && is_string($_POST["descripcion"]) && is_numeric($_POST["pvp"]) && is_string($_POST["familia"]) && is_numeric($_POST["id"])) {
        $name = $_POST["nombre"];
        $shortName = $_POST["nombre_corto"];
        $description = $_POST["descripcion"];
        $price = $_POST["pvp"];
        $family = $_POST["familia"];

        $create = $repository->UpdateProduct($name, $shortName, $description, $price, $family, $id);

        header("Location: ../view/listado.php");

    } else {
        header("Location: ../view/errorActualizar.php");
    }
}  