<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio4. Consumo de servicios Web de imágenes y fotografías usando XML." />
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="Ejercicio4.css" />
</head>

<body>
    <h1>Buscador de imágenes</h1>

    <?php
    class Imagenes
    {
        private $api_key;
        private $tag;
        private $perPage;

        public function __construct()
        {
            $this->api_key = '0565634739c78dcdbf56368cb0991f0b';
            // $this->tag = 'aves';
            $this->perPage = 20;
        }

        public function loadData()
        {
            $this->tag = $_POST['tema'];

            $url = 'http://api.flickr.com/services/feeds/photos_public.gne?';
            $url .= '&api_key' . $this->api_key;
            $url .= '&tags=' . $this->tag;
            $url .= '&per_page=' . $this->perPage;
            $url .= '&format=xml';
            $url .= 'nojsoncallback=0';

            $result = file_get_contents($url);
            if ($result == null) {
                echo "<p id='errorCarga'>Error en la carga del archivo XML</p>";
            }

            // Se convierte el string en un objeto XML
            $xml = new SimpleXMLElement($result);

            echo "<h2>Tema de la búsqueda: $this->tag</h2>";

            for ($i = 0; $i < $this->perPage; $i++) {
                echo "<h3>Foto [$i]</h3>";

                $titulo = $xml->entry[$i]->title;
                echo "<p>Título: {$titulo}</p>";

                $publicacion = $xml->entry[$i]->published;
                echo "<p>Fecha de publicación: {$publicacion}</p>";

                $contenido = $xml->entry[$i]->content;
                echo "<p>{$contenido}</p>";
            }
        }

        public function getResults($a1)
        {
            // Reemplazar whitespaces para ejecutar peticion correctamente
            $this->tag = str_replace(" ", "+", $a1);
            $this->loadData();
        }
    }

    if (!isset($_SESSION['imagenes'])) {
        $_SESSION['imagenes'] = new Imagenes();
    }
    $imagenes = $_SESSION['imagenes'];

    if (count($_POST) > 0) {
        if (isset($_POST['buscar']) && isset($_POST['tema'])) {
            $imagenes->getResults($_POST['tema']);
        }
    }

    echo "<h2>¿Qué imágenes quieres ver?</h2>";

    echo "<form id='formulario' action='#' method='post' name='Imagenes'>
        <input type='text' id='tema' placeholder='Tema de la búsqueda...' name='tema'/>
        <input type='submit' class='button' name='buscar' value='BUSCAR'/>
    </form>";

    ?>

    <footer>
        <p>Imágenes obtenidas de <a href="https://www.flickr.com/">Flickr</a></p>
        <p>Autor: Sofía Suárez Fernández. Universidad de Oviedo. Software y Estándares para la Web</p>
        <a href="http://validator.w3.org/check/referer" hreflang="en-us">
            <img src="valid-html5-button.png" alt="¡HTML5 válido!" height="31" width="88" /></a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>

</html>