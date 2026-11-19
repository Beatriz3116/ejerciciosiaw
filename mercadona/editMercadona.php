<?php
if (!isset($_GET['id'])) {
    header('Location:error.php?error=id');
    exit;
}
$id = $_GET['id'];

$host     = 'mysql';
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    $sql = "select *
            from mercadona
            where id = :id";
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'id' => $id
    ];
    $sentencia_preparada->execute($datos);
} catch (\Throwable $error) {
    echo ('Se ha producido un //herror, aquí más información: ');
    echo ($error->getMessage());
    exit;
}
$fila = $sentencia_preparada->fetch();
if ($fila == NULL) {
    header('Location:error.php?error=mercadona');
    exit;
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
        <h1>Edición de tienda Mercadona</h1>
        <a href="index.php">Volver al listado.</a>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $fila['id'] ?>">
            <label for="direccion">Dirección</label>
            <input type="text"
                   name="direccion"
                   id="direccion"
                   value="<?= $fila['direccion'] ?>"
                   placeholder="Introduce la dirección. Ej.: Calle Recogidas, 45"
                   required
                   maxlength="150">
            <br>
            <label for="localidad">Localidad</label>
            <input type="text"
                   name="localidad"
                   id="localidad"
                   value="<?= $fila['localidad'] ?>"
                   placeholder="Introduce la localidad. Ej.: Granada"
                   required
                   maxlength="100">
            <br>
            <label for="fecha_apertura">Fecha de apertura</label>
            <input type="date"
                   name="fecha_apertura"
                   id="fecha_apertura"
                   value="<?= $fila['fecha_apertura'] ?>"
                   required>
            <br>
            <label for="encargado">Encargado</label>
            <input type="text"
                   name="encargado"
                   id="encargado"
                   value="<?= $fila['encargado'] ?>"
                   placeholder="Introduce el nombre del encargado. Ej.: María López"
                   maxlength="150">
            <br>
            <label for="telefono">Teléfono</label>
            <input type="text"
                   name="telefono"
                   id="telefono"
                   value="<?= $fila['telefono'] ?>"
                   placeholder="Introduce el teléfono. Ej.: 958123456"
                   maxlength="12">
            <br>
            <label for="ingreso_anual">Ingreso anual</label>
            <input type="number"
                   name="ingreso_anual"
                   id="ingreso_anual"
                   value="<?= $fila['ingreso_anual'] ?>"
                   placeholder="Introduce el ingreso anual. Ej.: 1250000.500"
                   min="0.000"
                   max="9999999.999"
                   step="0.001">
            <br>
            <button type="submit">Confirmar edición de la tienda</button>
        </form>
    </body>
</html>