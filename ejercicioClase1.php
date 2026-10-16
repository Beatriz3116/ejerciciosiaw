<?php
$alumnos = [
    [
        "nombre" => "Carlos",
        "apellidos" => "García López",
        "notas" => [7.5, 8.0, 6.5, 9.0]
    ],
    [
        "nombre" => "María",
        "apellidos" => "Fernández Ruiz",
        "notas" => [9.0, 8.5, 7.5, 10.0, 9.5]
    ],
    [
        "nombre" => "Javier",
        "apellidos" => "Martínez Sánchez",
        "notas" => [5.0, 6.5, 7.0, 4.5]
    ],
    [
        "nombre" => "Lucía",
        "apellidos" => "López Romero",
        "notas" => [8.0, 9.0, 8.5, 7.5, 9.0, 10.0]
    ],
    [
        "nombre" => "Daniel",
        "apellidos" => "Pérez Torres",
        "notas" => [6.0, 5.5, 7.0, 6.5, 8.0]
    ],
    [
        "nombre" => "Sofía",
        "apellidos" => "Gómez Díaz",
        "notas" => [9.5, 9.0, 10.0, 8.5]
    ],
    [
        "nombre" => "Pablo",
        "apellidos" => "Sánchez Moreno",
        "notas" => [4.0, 5.0, 6.0, 5.5, 7.0]
    ],
    [
        "nombre" => "Elena",
        "apellidos" => "Ramírez Ortega",
        "notas" => [7.0, 8.5, 9.0, 8.0, 9.5, 7.5]
    ],
    [
        "nombre" => "Alejandro",
        "apellidos" => "Torres Navarro",
        "notas" => [6.5, 7.0, 5.5, 8.0]
    ],
    [
        "nombre" => "Carmen",
        "apellidos" => "Romero Castillo",
        "notas" => [8.0, 7.5, 9.0, 8.5, 10.0]
    ],
    [
        "nombre" => "Miguel",
        "apellidos" => "Díaz Herrera",
        "notas" => [3.5, 4.5, 5.0, 6.0]
    ],
    [
        "nombre" => "Paula",
        "apellidos" => "Moreno Vega",
        "notas" => [9.0, 8.0, 9.5, 10.0, 8.5, 9.0]
    ],
    [
        "nombre" => "Adrián",
        "apellidos" => "Navarro Molina",
        "notas" => [5.5, 6.0, 7.5, 6.5, 5.0]
    ],
    [
        "nombre" => "Laura",
        "apellidos" => "Castillo Jiménez",
        "notas" => [8.5, 9.0, 7.5, 8.0]
    ],
    [
        "nombre" => "Diego",
        "apellidos" => "Vega Santos",
        "notas" => [6.0, 7.0, 8.0, 5.5, 6.5, 7.5]
    ],
    [
        "nombre" => "Andrea",
        "apellidos" => "Molina Cruz",
        "notas" => [9.5, 8.5, 9.0, 10.0, 9.0]
    ],
    [
        "nombre" => "Álvaro",
        "apellidos" => "Jiménez Flores",
        "notas" => [4.5, 5.0, 6.5, 7.0]
    ],
    [
        "nombre" => "Claudia",
        "apellidos" => "Santos León",
        "notas" => [7.5, 8.0, 9.0, 8.5, 7.0, 9.5]
    ],
    [
        "nombre" => "Sergio",
        "apellidos" => "Cruz Medina",
        "notas" => [5.0, 6.0, 4.5, 7.0, 6.5]
    ],
    [
        "nombre" => "Irene",
        "apellidos" => "Flores Vidal",
        "notas" => [8.0, 9.5, 8.5, 9.0]
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notas Medias de Alumnos</title>
    </head>
    <body>
        <table border='1'>
            <tr>
                <th>Índice</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nota Media</th>
            </tr>
            <?php
            foreach($alumnos as $index => $alumno) {
                // Cálculo de la nota media
                $media = array_sum($alumno['notas']) / count($alumno['notas']);
            ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $alumno['nombre'] ?></td> 
                <td><?= $alumno['apellidos'] ?></td>
                <td><?= number_format($media, 2) ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>