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

    $direccion      = 'Calle Recogidas, 45';
    $localidad      = 'Granada';
    $fecha_apertura = '2018-05-12';
    $encargado      = 'María López Ruiz';
    $telefono       = '958123456';
    $ingreso_anual  = 1250000.500;

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
    echo ('insert correcto<br>');
} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí más información: ');
    echo ($error->getMessage());
}