<?php

require ('../repository/Repository.php');

$id = null;
$error = false;

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    // Si la variable $id está definida y no es null: 1. se instancia un objeto de tipo Repository 2. se recuperan los datos de la base de datos y 3. se muestra el formulario para modificar el producto.

    $repository = new Repository();

    try {
        $fetchFamilies = $repository->FetchAllFromFamily();
        $product = $repository->FetchDataFromProduct($id);

    } catch (TypeError) {
        $error = true;
    }

} elseif (isset($_POST['id'])) {

    
    $id = $_POST['id'];

    $repository = new Repository();

    try {

        if (is_string($_POST["nombre"]) && is_string($_POST["nombre_corto"]) && is_string($_POST["descripcion"]) && is_numeric($_POST["pvp"]) && is_string($_POST["familia"]) && is_numeric($id)) {
            $name = $_POST["nombre"];
            $shortName = $_POST["nombre_corto"];
            $description = $_POST["descripcion"];
            $price = $_POST["pvp"];
            $family = $_POST["familia"];

            $repository->UpdateProduct($name, $shortName, $description, $price, $family, $id);

            header("Location: ../view/listado.php");

        } else {
            $error = true;
        }

    } catch (TypeError) {
        $error = true;

    }    

} ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Actualizar producto</title>
</head>
<body>
    
    <header>
        <h1 class="text-center mt-5">Actualizar producto</h1>
    </header>

    <?php if ($id === null || $error): ?>
        <!-- si hay un error -->
        <section class="mb-5">
            <h2 class="text-center mt-5"> Lo sentimos, no se ha podido actualizar el producto. <h2>
        </section>
        <section class="text-center mb-5">
            <button type="button" onclick="window.location.href='listado.php'" class="btn btn-outline-warning">Volver</button>
        </section>

    <?php else: ?>

        <form class="mx-auto" style="width: 800px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <input type='hidden' name='id' value='<?php echo $id=$_GET['id']; ?>'>
        
            <div class="mt-5 mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre" class="ml-3" value="<?php echo $product['nombre'] ?>">

                <label for="short_name" class="ml-5">Nombre corto</label>
                <input type="text" name="nombre_corto" placeholder="Nombre corto" value="<?php echo $product['nombre_corto'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="price">Precio (€)</label>
                <input type="float" name="pvp" placeholder="00.00 €" class="ml-2" value="<?php echo $product['pvp'] ?>">

                <label for="family" class="ml-5">Familia</label>
                <select name="familia" id="family" class="ml-2">
                    <?php foreach ($fetchFamilies as $family): ?>
                        <option value="<?php echo $family['cod'] ?>"
                            <?php if ($family['cod'] === $product['familia']):?> selected <?php endif; ?>>
                            <?php echo $family['nombre']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="description">Descripción</label> <br>
                <textarea name="descripcion" rows="5" cols="80" value="<?php echo $product['descripcion'] ?>"><?php echo $product['descripcion'] ?></textarea>
            </div>

            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-outline-success mr-5" name="Modificar" value="Modificar"></input>

                <button type="button" onclick="window.location.href='listado.php'" class="btn btn-outline-warning">Volver</button>
            </div>
        </form>

    <?php endif; ?>

</body>
</html>