<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio7. Insertar datos." />
    <title>Ejercicio 7</title>
    <link rel="stylesheet" href="Ejercicio7.css" />
</head>

<body>

    <h1>Gestión UniOvi</h1>

    <nav>
        <ul>
            <li><a href="Ejercicio7.php" title="Menú principal">Menú principal</a></li>
            <li><a href="CreateDataBase.php" title="Crear Base">Crear Base de Datos</a></li>
            <li><a href="SearchData.php" title="Buscar Datos">Buscar datos en una tabla</a></li>
            <li><a href="DeleteData.php" title="Eliminar Datos">Eliminar datos de una tabla</a></li>
        </ul>
    </nav>

    <h2>Insertar Datos</h2>
    <form id="formBase" action='#' method='post'>
        <!-- DEPARTAMENTO -->
        <p>DEPARTAMENTO</p>
        <p>Nombre del departamento:<input type="text" class="text" name="nombreDep" /> </p>
        <p>Ubicación del departamento:<input type="text" class="text" name="ubicacionDep" /> </p>
        <input type='submit' class='button' name='insertarDep' value='Insertar Datos Departamento' />

        <!-- FACULTAD -->
        <p>FACULTAD</p>
        <p>Nombre de la facultad:<input type="text" class="text" name="nombreFac" /> </p>
        <p>Ubicación del departamento:<input type="text" class="text" name="ubicacionFac" /> </p>

        <input type='submit' class='button' name='insertarFac' value='Insertar Datos Facultad' />

        <!-- DOCENTE -->
        <p>DOCENTE</p>
        <p>Nombre del docente:<input type="text" class="text" name="nombreDoc" /> </p>
        <p>Apellidos del docente:<input type="text" class="text" name="apellidosDoc" /> </p>
        <p>Edad del docente:<input type="text" class="text" name="edadDoc" /> </p>
        <p>Sexo del docente:<input type="text" class="text" name="sexoDoc" /> </p>
        <p>ID departamento del docente:<input type="text" class="text" name="idDep" /> </p>
        <p>ID Facultad del docente:<input type="text" class="text" name="idFac" /> </p>
        <input type='submit' class='button' name='insertarDoc' value='Insertar Datos Docente' />
    </form>

    <?php
    require('Ejercicio7.php');
    $db = new BaseDatos();

    if (count($_POST) > 0) {
        if (isset($_POST['insertarDep'])) {
            $db->insertDataDepartamento();
        }
        if (isset($_POST['insertarFac'])) {
            $db->insertDataFacultad();
        }
        if (isset($_POST['insertarDoc'])) {
            $db->insertDataDocente();
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