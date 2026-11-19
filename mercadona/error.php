<?php
$mensaje = 'La acción NO se ha relizado correctamente.';
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $mensajes = [
        'id'        => 'No ha llegado el id de la tienda.',
        'mercadona' => 'La tienda no existe.',
        'destroy'   => 'No se ha podido borrar la tienda.',
        'datos'     => 'Los datos del formulario no son válidos.',
        'store'     => 'No se ha podido insertar la tienda.',
        'update'    => 'No se ha podido actualizar la tienda.'
    ];
    if (isset($mensajes[$error])) {
        $mensaje = $mensajes[$error];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Se ha producido un error en la operación de la tienda.
    </h1>
    <h2>
        <?= $mensaje ?>
        <br>
        <a href="index.php">Volver al listado</a>
    </h2>
</body>
</html>