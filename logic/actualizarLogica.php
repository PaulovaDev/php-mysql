<?php

require ('../repository/Repository.php');

$id = $_GET['id'];

if ((isset($id)) == false) {
    header('Location:listado.php');
}

$repository = new Repository();

if (isset($_POST["Modificar"])) {

    $name = $_POST["nombre"];
    $shortName = $_POST["nombre_corto"];
    $description = $_POST["descripcion"];
    $price = $_POST["pvp"];
    $family = $_POST["familia"];
    $id = $_POST["id"];

    $create = $repository->UpdateProduct($name, $shortName, $description, $price, $family, $id);
}  

header("Location: listado.php");

