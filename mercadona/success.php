<?php
$mensaje = 'La acción se ha relizado correctamente.';
if (isset($_GET['ok'])) {
    $ok = $_GET['ok'];
    $mensajes = [
        'store'   => 'Se ha insertado correctamente.
        <a href="create.php">Seguir insertando</a><br>',
        'destroy' => 'Se ha borrado correctamente.',
        'update'  => 'Se ha actualizado correctamente.',
    ];
    if (isset($mensajes[$ok])) {
        $mensaje = $mensajes[$ok];
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
        Operación realizada correctamente en Mercadona.<br>
    </h1>
    <h2>
        <?= $mensaje ?>
        <br>
        <a href="index.php">Volver al listado</a>
    </h2>
</body>
</html>