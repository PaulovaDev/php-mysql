<?php

require ('../repository/Repository.php');

$error = false;

$repository = new Repository();
$fetchFamilies = $repository->FetchAllFromFamily();

if (isset($_POST["Create"])) {

    try {
        
        if (is_string($_POST["nombre"]) && is_string($_POST["nombre_corto"]) && is_string($_POST["descripcion"]) && is_numeric($_POST["pvp"]) && is_string($_POST["familia"])) {
            $name = $_POST["nombre"];
            $shortName = $_POST["nombre_corto"];
            $description = $_POST["descripcion"];
            $price = $_POST["pvp"];
            $family = $_POST["familia"];
            
            $create = $repository->InsertProduct($name, $shortName, $description, $price, $family);

            header("Location: ../view/listado.php");

        } else {
            $error = true;
        }

    } catch (PDOException $ex) {
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

    <title>Crear producto</title>
</head>
<body>
    <header>
        <h1 class="text-center mt-5">Crear producto</h1>
    </header>

<?php if ($error != true): ?>

    <form name="create" class="mx-auto" style="width: 800px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="mt-5 mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" class="ml-3">

            <label for="short_name" class="ml-5">Nombre corto</label>
            <input type="text" name="nombre_corto" placeholder="Nombre corto">
        </div>

        <div class="mb-3">
            <label for="price">Precio (€)</label>
            <input type="float" name="pvp" placeholder="00.00 €" class="ml-2">

            <label for="family" class="ml-5">Familia</label>
            <select name="familia" id="family" class="ml-2">
                <?php foreach ($fetchFamilies as $family): ?>
                    <option value="<?php echo $family['cod'] ?>;">
                        <?php echo $family['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="description">Descripción</label> <br>
            <textarea name="descripcion" rows="5" cols="80"></textarea>
        </div>

        <div class="mt-3 text-center">

            <input type="submit" class="btn btn-outline-success mr-5" value="Crear" name="Create"></input>

            <input type="reset" class="btn btn-outline-danger mr-5" value="Limpiar"></input>

            <button type="button" onclick="window.location.href='listado.php'" class="btn btn-outline-warning">Volver</button>
        </div>
    </form>

<?php else: ?>

    <section class="mb-5 text-center">
        <h2> Lo sentimos, no se ha podido crear el producto. <h2>
    </section>
    <section class="mb-5 text-center">
        <button type="button" onclick="window.location.href='crear.php'" class="btn btn-outline-warning">Volver</button>
    </section>

<?php endif ?>

</body>
</html>