<?php
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
    if (!isset($_POST['id'])) {
        header('Location:error.php?error=id');
        exit;
    }
    $id = $_POST["id"];
    $sql = "DELETE FROM mercadona WHERE id = :id";
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'id' => $id
    ];
    $sentencia_preparada->execute($datos);
    header('Location: success.php?ok=destroy');
} catch (\Throwable $error) {
    header('Location: error.php?error=destroy');
}