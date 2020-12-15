<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio7. Buscar datos." />
    <title>Ejercicio 7</title>
    <link rel="stylesheet" href="Ejercicio7.css" />
</head>

<body>

    <h1>Gestión UniOvi</h1>

    <nav>
        <ul>
            <li><a href="Ejercicio7.php" title="Menú principal">Menú principal</a></li>
            <li><a href="CreateDataBase.php" title="Crear Base">Crear Base de Datos</a></li>
            <li><a href="InsertData.php" title="Insertar Datos">Insertar datos</a></li>
            <li><a href="DeleteData.php" title="Eliminar Datos">Eliminar datos de una tabla</a></li>
        </ul>
    </nav>

    <h2>Buscar Datos</h2>
    <form id="formBase" action='#' method='post'>
        <p>Mostrar datos almacenados:
            <input type='submit' class='button' name='buscar' value="Mostrar Datos" /></p>
    </form>

    <?php
    require('Ejercicio7.php');
    $db = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['buscar'])) {
            $db->searchDataDepartamento();
            $db->searchDataFacultad();
            $db->searchDataDocente();
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