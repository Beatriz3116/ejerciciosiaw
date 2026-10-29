<?php
// seeder: para poblar las tablas de mi aplicación para disponer de datos iniciales.

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
    
    $sql1 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES('Administracién de Sistemas Gestores de Base de Datos', 'ASGBD', 5, 3);";

    $sql2 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Inglés', 'IGL', 5, 2);";
                  
    $sql3 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Servicios de Red e Internet', 'SRI', 8, 5);";
                  
    $sql4 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Implantación de Aplicaciones Web', 'IAW', 7, 4);";
                  
    $sql5 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Seguridad Alta Disponibilidad', 'SAD', 7, 3);";
                  
    $sql6 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Itinerario Personal para la Empleabilidad II', 'IPEII', 5, 3);";
                  
    $sql7 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Optativa ASIR', 'OPT', 5, 3);";
                  
    $sql8 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Proyecto Intermodular de ASIR', 'PSIR', 4, 2);";
                  
    $sql9 = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES ('Administración en Sistemas Operativos', 'ASO', 5, 5);";

    $pdo->exec($sql1);
    echo ('insert 1 correcto<br>');
    $pdo->exec($sql2);
    echo ('insert 2 correcto<br>');
    $pdo->exec($sql3);
    echo ('insert 3 correcto<br>');
    $pdo->exec($sql4);
    echo ('insert 4 correcto<br>');
    $pdo->exec($sql5);
    echo ('insert 5 correcto<br>');
    $pdo->exec($sql6);
    echo ('insert 6 correcto<br>');
    $pdo->exec($sql7);
    echo ('insert 7 correcto<br>');
    $pdo->exec($sql8);
    echo ('insert 8 correcto<br>');
    $pdo->exec($sql9);
    echo ('insert 9 correcto<br>');
    echo "Datos insertados correctamente en la tabla 'modulos'.";
} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí más información: ');
    echo ($error->getMessage());
}
?>