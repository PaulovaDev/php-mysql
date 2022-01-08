<?php

require ('../repository/Repository.php');

$id = $_GET['id'];

if ((isset($id)) == false) {
    header('Location:listado.php');
}

$repository = new Repository();

$product = $repository->FetchDataFromProduct($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Detalle del Producto</title>
</head>
<body>
    <header>
        <h1 class="text-center mt-5">Detalle del Producto</h1>
    </header>

    <section class="mx-auto mt-5" style="width: 500px;">
        <div class="text-center font-weight-bold">
            <?php echo $product['nombre']; ?>
        </div>
        <div class="mt-3">
            <p class="text-center font-weight-bold"> Código: <?php echo $product['id']; ?> </p>
            <p> Nombre: <?php echo $product['nombre']; ?> </p>
            <p> Nombre corto: <?php echo $product['nombre_corto']; ?> </p>
            <p> Código Familia: <?php echo $product['familia']; ?> </p>
            <p> PVP(€): <?php echo $product['pvp']; ?> </p>
            <p> Descripción: <?php echo $product['descripcion']; ?> </p>
        </div>
    </section>

    <section class="mt-5 text-center">
        <button type="button" onclick="window.location.href='listado.php'" class=" mb-5 btn btn-outline-warning">Volver</button>
    </section>
</body>
</html>