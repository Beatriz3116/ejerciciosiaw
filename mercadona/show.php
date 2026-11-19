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
    <title>Vista de una tienda</title>
</head>
    <body>
        <h1>Datos de una tienda Mercadona</h1>
        <h2>
            <a href="index.php">Volver</a>
        </h2>
        <table border="1">
            <tr>
                <td>#</td>
                <td>Dirección</td>
                <td>Localidad</td>
                <td>Fecha apertura</td>
                <td>Encargado</td>
                <td>Teléfono</td>
                <td>Ingreso anual</td>
                <td>Operación</td>
            </tr>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['direccion'] ?></td>
                <td><?= $fila['localidad'] ?></td>
                <td><?= $fila['fecha_apertura'] ?></td>
                <td><?= $fila['encargado'] ?></td>
                <td><?= $fila['telefono'] ?></td>
                <td><?= $fila['ingreso_anual'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $fila['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $fila['id'] ?>">Borrar</a>
                </td>
            </tr>
        </table>
    </body>
</html>