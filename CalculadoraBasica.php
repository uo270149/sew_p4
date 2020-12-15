<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio1. Calculadora Básica." />
    <title>Calculadora Basica</title>
    <link rel="stylesheet" href="CalculadoraBasica.css" />
</head>

<body>
    <h1>Calculadora Básica</h1>

    <?php
    class CalculadoraBasica
    {
        public $console;
        private $mem;

        public function __construct()
        {
            $this->console = "";
            $this->mem = 0;
        }

        public function getConsole()
        {
            return $this->console;
        }

        public function getMem()
        {
            return $this->mem;
        }

        public function addDataToConsole($val)
        {
            if ($this->getConsole() === "NaN" | $this->getConsole() === "SyntaxError" | $this->getConsole() === "Infinity") {
                $this->console = "";
            }
            $this->console .= $val; // concatena el valor del operando de la izda con la expresion de la dcha 
        }

        public function compute()
        {
            try {
                $this->console = eval("return $this->console ;");
            } catch (Exception $e) {
                $this->console = "Syntax Error";
            }
        }

        public function mMas()
        {
            $this->mem = $this->getMem() + eval("return $this->console ;");
            $this->console = $this->getMem();
        }

        public function mMenos()
        {
            $this->mem = $this->getMem() - eval("return $this->console ;");
            $this->console = $this->getMem();
        }

        public function delete()
        {
            $this->console = "";
        }

        public function mrc()
        {
            $this->console .= $this->getMem(); // concatena el valor del operando de la izda con la expresion de la dcha
            $this->mem = 0;
        }
    }

    // isset comprueba que una variable no esté definida
    if (!isset($_SESSION['calculadoraBasica'])) {
        $_SESSION['calculadoraBasica'] = new CalculadoraBasica();
    }
    $calculadoraBasica = $_SESSION['calculadoraBasica'];

    // $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
    if (count($_POST) > 0) {
        if (isset($_POST['mrc'])) {
            $calculadoraBasica->mrc();
        } else if (isset($_POST['mMenos'])) {
            $calculadoraBasica->mMenos();
        } else if (isset($_POST['mMas'])) {
            $calculadoraBasica->mMas();
        } else if (isset($_POST['division'])) {
            $calculadoraBasica->addDataToConsole("/");
        } else if (isset($_POST['7'])) {
            $calculadoraBasica->addDataToConsole("7");
        } else if (isset($_POST['8'])) {
            $calculadoraBasica->addDataToConsole("8");
        } else if (isset($_POST['9'])) {
            $calculadoraBasica->addDataToConsole("9");
        } else if (isset($_POST['multiplicacion'])) {
            $calculadoraBasica->addDataToConsole("*");
        } else if (isset($_POST['4'])) {
            $calculadoraBasica->addDataToConsole("4");
        } else if (isset($_POST['5'])) {
            $calculadoraBasica->addDataToConsole("5");
        } else if (isset($_POST['6'])) {
            $calculadoraBasica->addDataToConsole("6");
        } else if (isset($_POST['resta'])) {
            $calculadoraBasica->addDataToConsole("-");
        } else if (isset($_POST['1'])) {
            $calculadoraBasica->addDataToConsole("1");
        } else if (isset($_POST['2'])) {
            $calculadoraBasica->addDataToConsole("2");
        } else if (isset($_POST['3'])) {
            $calculadoraBasica->addDataToConsole("3");
        } else if (isset($_POST['suma'])) {
            $calculadoraBasica->addDataToConsole("+");
        } else if (isset($_POST['0'])) {
            $calculadoraBasica->addDataToConsole("0");
        } else if (isset($_POST['punto'])) {
            $calculadoraBasica->addDataToConsole(".");
        } else if (isset($_POST['C'])) {
            $calculadoraBasica->delete();
        } else if (isset($_POST['igual'])) {
            $calculadoraBasica->compute();
        }
    }

    echo "<form action='#' method='post' name='CalculadoraBasica'>
            <input type='text' id='result' name='expr' value='$calculadoraBasica->console' readonly /> 

            <input type='submit' class='button' name='mrc' value='mrc'/>
            <input type='submit' class='button' name='mMenos' value='m-'/>
            <input type='submit' class='button' name='mMas' value='m+'/>
            <input type='submit' class='button' name='division' value='/'/>

            <input type='submit' class='button' name='7' value='7'/>
            <input type='submit' class='button' name='8' value='8'/>
            <input type='submit' class='button' name='9' value='9'/>
            <input type='submit' class='button' name='multiplicacion' value='*'/>

            <input type='submit' class='button' name='4' value='4'/>
            <input type='submit' class='button' name='5' value='5'/>
            <input type='submit' class='button' name='6' value='6'/>
            <input type='submit' class='button' name='resta' value='-'/>

            <input type='submit' class='button' name='1' value='1'/>
            <input type='submit' class='button' name='2' value='2'/>
            <input type='submit' class='button' name='3' value='3'/>
            <input type='submit' class='button' name='suma' value='+'/>

            <input type='submit' class='button' name='0' value='0'/>
            <input type='submit' class='button' name='punto' value='.'/>
            <input type='submit' class='button' name='C' value='C'/>
            <input type='submit' class='button' name='igual' value='='/>
        </form>";
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