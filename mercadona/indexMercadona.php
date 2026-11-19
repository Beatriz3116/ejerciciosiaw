<?php
$host     = 'mysql';
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // los fetch son asociativos.
    PDO::ATTR_EMULATE_PREPARES   => false,  // son sentencias preparadas.
];
try {
    $pdo = new PDO($dsn, $user, $password, $options);
    $sql = "select * from mercadona";
    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute();
} catch (\Throwable $error) {
    echo ('Se ha producido un //herror, aquí más información: ');
    echo ($error->getMessage());
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tiendas Mercadona</title>
</head>
    <body>
        <h1>Lista de tiendas Mercadona.</h1>
        <h2>
            <a href="createMercadona.php">Crear tienda</a>
        </h2>
        <table border="1">
            <tr>
                <td>#</td>
                <td>Tienda</td>
                <td>Operación</td>
            </tr>
            <?php
            while ($fila = $sentencia_preparada->fetch()) {
            ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['direccion'] . ' (' . $fila['localidad'] . ')' ?></td>
                <td>
                    <a href="showMercadona.php?id=<?= $fila['id'] ?>">Ver</a>
                    <a href="editMercadona.php?id=<?= $fila['id'] ?>">Editar</a>
                    <a href="deleteMercadona.php?id=<?= $fila['id'] ?>">Borrar</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>