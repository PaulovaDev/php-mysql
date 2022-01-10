<?php

require ('../repository/Repository.php');

$id = $_GET['id'];
$error = false;

if ((isset($id)) === true) {

    try {
        $repository = new Repository();
        $repository->DeleteProduct($id);

    } catch (TypeError) {
        $error = true;
    }

} else {

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Borrar Producto</title>
</head>
<body class="text-center">
    <header>
        <h1 class="mt-5">Borrar Producto<h1>
    </header>

<?php if ($error): ?>
    <section class="mt-5">
        <h2 class="text-center mt-5"> Lo sentimos, no se ha podido borrar el producto. <h2>
    </section>
    <section class="mt-5">
        <button type="button" onclick="window.location.href='listado.php'" class="btn btn-outline-warning">Volver</button>
    </section>

<?php else: ?>
    <section class="mt-5">
        <?php echo "El producto con código " . $id . " ha sido borrado correctamente."; ?>
    </section>
    <section class="mt-5">
        <button type="button" onclick="window.location.href='listado.php'" class="btn btn-outline-warning">Volver</button>
    </section>
<?php endif; ?>

</body>
</html>

