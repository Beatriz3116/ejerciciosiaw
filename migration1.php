<?php
/* variables de conexión */
$host     = 'mysql';
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

// Cadena de conexión
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo ('Conexión es correcta a MySQL.<br>');

    $sql = "CREATE TABLE IF NOT EXISTS modulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL UNIQUE,
        abreviatura VARCHAR(5) NOT NULL UNIQUE,
        creditos DECIMAL(4,2) NOT NULL,
        horassemanales SMALLINT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Ejecutamos la sentencia en el servidor
    $pdo->exec($sql);
    echo "La tabla 'modulos' se ha creado correctamente.";

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí más información: ');
    echo ($error->getMessage());
}
?>