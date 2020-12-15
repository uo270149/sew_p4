<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio7. Eliminar datos." />
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
            <li><a href="SearchData.php" title="Buscar Datos">Buscar datos en una tabla</a></li>
        </ul>
    </nav>

    <h2>Eliminar Datos</h2>
    <form id="formBase" action='#' method='post'>
        <p>ID a eliminar:<input type="text" class="text" id="id" /></p>

        <input type='submit' class='button' name='deleteDep' value="Eliminar Departamento" />
        <input type='submit' class='button' name='deleteFac' value="Eliminar Facultad" />
        <input type='submit' class='button' name='deleteDoc' value="Eliminar Docente" />
    </form>

    <?php
    require('Ejercicio7.php');
    $db = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['deleteDep'])) {
            $db->deleteDataDepartamento();
        }
        if (isset($_POST['deleteFac'])) {
            $db->deleteDataFacultad();
        }
        if (isset($_POST['deleteDoc'])) {
            $db->deleteDataDocente();
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