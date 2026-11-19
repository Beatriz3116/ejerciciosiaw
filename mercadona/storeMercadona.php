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

    if (
        !isset($_POST['direccion']) ||
        !isset($_POST['localidad']) ||
        !isset($_POST['fecha_apertura']) ||
        !isset($_POST['encargado']) ||
        !isset($_POST['telefono']) ||
        !isset($_POST['ingreso_anual'])
    ) {
        header('Location:error.php?error=datos');
        exit;
    }

    $direccion      = $_POST['direccion'];
    $localidad      = $_POST['localidad'];
    $fecha_apertura = $_POST['fecha_apertura'];
    $encargado      = $_POST['encargado'];
    $telefono       = $_POST['telefono'];
    $ingreso_anual  = $_POST['ingreso_anual'];

    if ($encargado == '') {
        $encargado = null;
    }
    if ($telefono == '') {
        $telefono = null;
    }
    if ($ingreso_anual == '') {
        $ingreso_anual = 0;
    }

    $sql = "INSERT INTO mercadona (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
            VALUES(:direccion, :localidad, :fecha_apertura, :encargado, :telefono, :ingreso_anual);";

    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'direccion'      => $direccion,
        'localidad'      => $localidad,
        'fecha_apertura' => $fecha_apertura,
        'encargado'      => $encargado,
        'telefono'       => $telefono,
        'ingreso_anual'  => $ingreso_anual
    ];

    $sentencia_preparada->execute($datos);
    header('Location: success.php?ok=store');
} catch (\Throwable $error) {
    header('Location: error.php?error=store');
}