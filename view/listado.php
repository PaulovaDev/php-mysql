<?php

require ('../repository/Repository.php');

$fetch = new Repository();
$results = $fetch->FetchIdAndNameFromProduct();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <title>Gestión de productos</title>
</head>
<body>
    
    <header>
        <h1 class="text-center mt-5">Gestión de productos</h1>
    </header>
    
    <section class="mx-auto create" style="width: 900px;">
        <button type="button" onclick="window.location.href='crear.php'" class="btn btn-outline-success mb-3 ml-4">Crear</button>
    </section>

    <section class="mx-auto" style="width: 900px;">
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">Detalle</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>     
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr class="text-center">
                        <td> 
                            <button type="button" onclick="window.location.href='detalle.php?id=<?php echo $result['id']; ?>'" class="btn btn-outline-info">Detalle</button>
                        </td>
                        <td> <?= $result['id']; ?> </td>
                        <td> <?= $result['nombre']; ?> </td>
                        <td>
                            <button type="button" onclick="window.location.href='update.php?id=<?php echo $result['id']; ?>'" class="btn btn-outline-warning">Actualizar</button>
                            <button type="button" onclick="window.location.href='borrar.php?id=<?php echo $result['id']; ?>'" class="btn btn-outline-danger">Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </section>
</body>
</html>