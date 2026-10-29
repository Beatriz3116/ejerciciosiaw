<?php
// esta página recibe los datos de un módulo nuevo los lee y los utiliza para insertarlo en la tabla.

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

    // Validación básica de campos obligatorios
    if (!isset($_POST['nombre']) || 
        !isset($_POST['abreviatura']) || 
        !isset($_POST['creditos']) ||
        !isset($_POST['horassemanales'])) {
        header('Location: error.php');
        exit;
    }

    $nombre = $_POST["nombre"];
    $abreviatura = $_POST["abreviatura"];
    $creditos = $_POST["creditos"];
    $horassemanales = $_POST["horassemanales"];

    // Si horas semanales viene vacío, lo tratamos como null
    if ($horassemanales == '') {
        $horassemanales = null;
    }

    $sql = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES (:nombre, 
                    :abreviatura, 
                    :creditos, 
                    :horassemanales);";

    $sentencia_preparada = $pdo->prepare($sql);

    $datos = [
        'nombre' => $nombre,
        'abreviatura' => $abreviatura,
        'creditos' => $creditos,
        'horassemanales' => $horassemanales
    ];

    $sentencia_preparada->execute($datos);

    // Redirección hacia éxito
    header('Location: exito1.php');

} catch (\Throwable $error) {
    // Redirección hacia error en caso de fallo (duplicados, etc.)
    header('Location: error1.php');
}
?>