<?php

require ('../Repository.php');

$repository = new Repository();
$fetchFamilies = $repository->FetchAllFromFamily();

?>

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
        <h1 class="text-center">Crear producto</h1>
    </header>

    <form class="mx-auto" style="width: 900px;" action="crearLogica.php" method="POST">
        <div class="mt-5 mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre">

            <label for="short_name" class="ml-5">Nombre corto</label>
            <input type="text" name="nombre_corto" placeholder="Nombre corto">
        </div>

        <div class="mb-3">
            <label for="price">Precio (€)</label>
            <input type="float" name="pvp" placeholder="Precio (€)">

            <label for="family" class="ml-5">Familia</label>
            <select name="familia" id="family">
                <?php foreach ($fetchFamilies as $family): ?>
                    <option value="<?php echo $family['cod'] ?>;">
                        <?php echo $family['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="description">Descripción</label>
            <textarea name="descripcion" rows="10" cols="40"></textarea>
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-outline-success mr-5" value="Crear"></input>

            <input type="reset" onclick="window.location.href='borrar.php'" class="btn btn-outline-danger mr-5" value="Limpiar"></input>

            <button type="button" onclick="window.location.href='listado.php'" class="btn btn-outline-warning">Volver</button>
        </div>
    </form>


</body>
</html>