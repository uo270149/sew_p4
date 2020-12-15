<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio6. Modificar datos." />
    <title>Ejercicio 6</title>
    <link rel="stylesheet" href="Ejercicio6.css" />
</head>

<body>
    <h1>Gestión de Base de Datos MySQL</h1>

    <nav>
        <ul>
            <li><a href="Ejercicio6.php" title="Menñu principal">Menú principal</a></li>
            <li><a href="CreateDataBase.php" title="Crear Base">Crear Base de Datos</a></li>
            <li><a href="CreateTable.php" title="Crear tabla">Crear una tabla</a></li>
            <li><a href="InsertData.php" title="Insertar Datos">Insertar datos en una tabla</a></li>
            <li><a href="SearchData.php" title="Buscar Datos">Buscar datos en una tabla</a></li>
            <li><a href="DeleteData.php" title="Eliminar Datos">Eliminar datos de una tabla</a></li>
            <li><a href="GenerateReport.php" title="Generar Informe">Generar informe</a></li>
            <li><a href="LoadData.php" title="Cargar datos">Cargar datos desde un archivo en una tabla de la Base de Datos</a></li>
            <li><a href="ExportData.php" title="Exportar Datos">Exportar datos a un archivo los datos desde una tabla de la Base de Datos</a></li>
        </ul>
    </nav>

    <h2>Modificar los datos en la tabla PruebasUsabilidad</h2>
    <form id="formBase" action='#' method='post'>
        <p>DNI de la entrada a actualizar:<input type="text" class="text" name="dni" /></p>
        <p>Datos del usuario:</p>
        <p>Nombre:<input type="text" class="text" name="nombre" /></p>
        <p>Apellidos:<input type="text" class="text" name="apellidos" /></p>
        <p>Email:<input type="text" class="text" name="email" /></p>
        <p>Telefono:<input type="text" class="text" name="telefono" /></p>
        <p>Edad:<input type="text" class="text" name="edad" /></p>
        <p>Sexo:<input type="text" class="text" name="sexo" /></p>

        <p>Datos de la prueba:</p>
        <p>Nivel de informática demostrado:
            <select name="nivelInformatica">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select></p>
        <p>Tiempo de realización:<input type="text" class="text" name="tiempo" /></p>
        <p>¿Tarea correcta?<input type="text" class="text" name="tareaCorrecta" /></p>

        <p>Otros:</p>
        <p>Comentarios:<input type="text" class="text" name="comentarios" /></p>
        <p>Propuestas de mejora:<input type="text" class="text" name="propuestasMejora" /></p>
        <p>Valoración:
            <select name="valoracion">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </p>

        <input type='submit' class='button' name='update' value="Modificar Datos" />
    </form>

    <?php
    require('Ejercicio6.php');
    $db = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['update'])) {
            $db->updateData();
        }
    }
    ?>

    <footer>
        <p>Autor: Sofía Suárez Fernández. Universidad de Oviedo. Software y Estándares para la Web</p>
        <a href="http://validator.w3.org/check/referer" hreflang="en-us">
            <img src="valid-html5-button.png" alt="¡HTML5 válido!" height="31" width="88" /></a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>

</html>