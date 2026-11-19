<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Alta de tienda Mercadona</h1>
        <a href="index.php">Volver al listado.</a>
        <form action="store.php" method="post"> <!-- post: crear y editar algo. -->
            <label for="direccion">Dirección</label>
            <input type="text"
                   name="direccion"
                   id="direccion"
                   value=""
                   placeholder="Introduce la dirección. Ej.: Calle Recogidas, 45"
                   required
                   maxlength="150">
            <br>
            <label for="localidad">Localidad</label>
            <input type="text"
                   name="localidad"
                   id="localidad"
                   value=""
                   placeholder="Introduce la localidad. Ej.: Granada"
                   required
                   maxlength="100">
            <br>
            <label for="fecha_apertura">Fecha de apertura</label>
            <input type="date"
                   name="fecha_apertura"
                   id="fecha_apertura"
                   value=""
                   required>
            <br>
            <label for="encargado">Encargado</label>
            <input type="text"
                   name="encargado"
                   id="encargado"
                   value=""
                   placeholder="Introduce el nombre del encargado. Ej.: María López"
                   required
                   maxlength="150">
            <br>
            <label for="telefono">Teléfono</label>
            <input type="text"
                   name="telefono"
                   id="telefono"
                   value=""
                   placeholder="Introduce el teléfono. Ej.: 958123456"
                   maxlength="12">
            <br>
            <label for="ingreso_anual">Ingreso anual</label>
            <input type="number"
                   name="ingreso_anual"
                   id="ingreso_anual"
                   value="0"
                   placeholder="Introduce el ingreso anual. Ej.: 1250000.500"
                   min="0.000"
                   max="9999999.999"
                   step="0.001">
            <br>
            <button type="submit">Alta de la tienda</button>
        </form>
    </body>
</html>