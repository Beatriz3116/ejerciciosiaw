<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Módulos</title>
</head>
<body>
    <h1>Alta de módulos</h1>
    <form action="store1.php" method="post">
        
        <label for="nombre">Nombre</label>
        <input type="text" 
               name="nombre" 
               id="nombre" 
               placeholder="Introduce el nombre del módulo. Ej.: Inglés" 
               required 
               minlength="2" 
               maxlength="100">
        <br>

        <label for="abreviatura">Abreviatura</label>
        <input type="text" 
               name="abreviatura" 
               id="abreviatura" 
               placeholder="Ej.: IGL" 
               required 
               minlength="1" 
               maxlength="5">
        <br>

        <label for="creditos">Créditos</label>
        <input type="number" 
               name="creditos" 
               id="creditos" 
               placeholder="Ej.: 5" 
               required 
               min="0.00" 
               max="99.99" 
               step="0.01">
        <br>

        <label for="horassemanales">Horas semanales</label>
        <input type="number" 
               name="horassemanales" 
               id="horassemanales" 
               placeholder="Ej.: 2">
        <br>

        <button type="submit">Alta del módulo</button>
    </form>
</body>
</html>