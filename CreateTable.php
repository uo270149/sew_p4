<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio6. Crear tabla." />
    <title>Ejercicio 6</title>
    <link rel="stylesheet" href="Ejercicio6.css" />
</head>

<body>
    <h1>Gestión de Base de Datos MySQL</h1>

    <nav>
        <ul>
            <li><a href="Ejercicio6.php" title="Menú principal">Menú principal</a></li>
            <li><a href="CreateDataBase.php" title="Crear Base">Crear Base de Datos</a></li>
            <li><a href="InsertData.php" title="Insertar Datos">Insertar datos en una tabla</a></li>
            <li><a href="SearchData.php" title="Buscar Datos">Buscar datos en una tabla</a></li>
            <li><a href="UpdateData.php" title="Modificar Datos">Modificar datos en una tabla</a></li>
            <li><a href="DeleteData.php" title="Eliminar Datos">Eliminar datos de una tabla</a></li>
            <li><a href="GenerateReport.php" title="Generar Informe">Generar informe</a></li>
            <li><a href="LoadData.php" title="Cargar datos">Cargar datos desde un archivo en una tabla de la Base de Datos</a></li>
            <li><a href="ExportData.php" title="Exportar Datos">Exportar datos a un archivo los datos desde una tabla de la Base de Datos</a></li>
        </ul>
    </nav>

    <h2>Crear Tabla</h2>
    <form id="formBase" action='#' method='post'>
        <input type='submit' class='button' name='crearTabla' value="Crear Tabla" />
    </form>

    <?php
    require('Ejercicio6.php');
    $db = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['crearTabla'])) {
            $db->createTable();
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