<?php
$alumnos = [
    ['Atienza Bermúdez, Alejandro', 'm', 21],
    ['Calderer Sánchez, Lucas', 'm', 19],
    ['Cano Merino, Carlos', 'm', 20],
    ['Chari, Abdelali', 'm', 23],
    ['García Zarco, Francisco José', 'm', 21],
    ['Gómez Pérez, Samuel', 'm', 22],
    ['Iáñez Navarro, Daniel', 'm', 20],
    ['López Lasheras, Alan', 'm', 21],
    ['Maldonado Cabezas, Francisco', 'm', 22],
    ['Martín Arias, Carlos', 'm', 19],
    ['Moreno González, Alexandra', 'f', 21],
    ['Muñoz Moreno, Elisabet', 'f', 22],
    ['Ourhzif, Aymane', 'm', 23],
    ['Sánchez Ortiz, Emilio David', 'm', 21],
    ['Sánchez Rodríguez, Beatriz', 'f', 20],
    ['Torres Gómez, Ignacio', 'm', 22],
    ['Uréndez Jiménez, Alba', 'f', 21],
    ['Uribe Aranda, Francisco', 'm', 24],
    ['Velasco Clavero, Pablo', 'm', 21],
];
//$alumnos[] = 'primer alumno';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title> 
    </head>
    <body>
        <h1>Ejercicio Género y Color</h1>
        <table border = "1px">
            <tr>
                <td>#</td>
                <td>Alumno</td>
                <td>Género</td>
            </tr>
            <?php
            $genero = null;
            foreach($alumnos as $indice =>  $alumnoGenero) {
                $edad = $alumnoGenero[2];
                if($edad %2 == 0) {
                    $colorEdad = "color: blue;"; //par en azul
                } else {
                    $colorFila = "background-color: lightblue;";
                }
            ?>
                <tr style="<?= $colorFila ?>">
                    <td><?= $indice ?></td>
                    <td><?= $alumnoGenero[0] ?></td>
                    <td><?= $alumnoGenero[1] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>
<?php
?>