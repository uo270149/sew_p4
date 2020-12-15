<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio2. Calculadora Científica." />
    <title>Calculadora Basica</title>
    <link rel="stylesheet" href="CalculadoraCientifica.css" />
</head>

<body>
    <h1>Calculadora Científica</h1>

    <?php
    class CalculadoraCientifica
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

        public function raiz()
        {
            $this->console = sqrt(floatval($this->console));
        }

        public function logaritmo()
        {
            $this->console = log(floatval($this->console));
        }

        public function seno()
        {
            $this->console = sin(floatval($this->console));
        }

        public function coseno()
        {
            $this->console = cos(floatval($this->console));
        }

        public function tangente()
        {
            $this->console = tan(floatval($this->console));
        }

        public function factorial()
        {
            $number = floatval($this->console);
            $fact = 1;
            for ($i = 1; $i <= $number; $i++) {
                $fact *= $i;
            }
            $this->console = $fact;
        }
    }

    // isset comprueba que una variable no esté definida
    if (!isset($_SESSION['calculadoraCientifica']))
        $_SESSION['calculadoraCientifica'] = new CalculadoraCientifica();
    $calculadora = $_SESSION['calculadoraCientifica'];

    if (count($_POST) > 0) {
        if (isset($_POST['mrc'])) {
            $calculadoraCientifica->mrc();
        } else if (isset($_POST['mMenos'])) {
            $calculadoraCientifica->mMenos();
        } else if (isset($_POST['mMas'])) {
            $calculadoraCientifica->mMas();
        } else if (isset($_POST['potenciaCuadrado'])) {
            $calculadoraCientifica->addDataToConsole("**2");
        } else if (isset($_POST['sin'])) {
            $calculadoraCientifica->seno();
        } else if (isset($_POST['cos'])) {
            $calculadoraCientifica->coseno();
        } else if (isset($_POST['tan'])) {
            $calculadoraCientifica->tangente();
        } else if (isset($_POST['raiz'])) {
            $calculadoraCientifica->raiz();
        } else if (isset($_POST['log'])) {
            $calculadoraCientifica->logaritmo();
        } else if (isset($_POST['C'])) {
            $calculadoraCientifica->delete();
        } else if (isset($_POST['division'])) {
            $calculadoraCientifica->addDataToConsole("/");
        } else if (isset($_POST['pi'])) {
            $calculadoraCientifica->addDataToConsole(M_PI);
        } else if (isset($_POST['7'])) {
            $calculadoraCientifica->addDataToConsole("7");
        } else if (isset($_POST['8'])) {
            $calculadoraCientifica->addDataToConsole("8");
        } else if (isset($_POST['9'])) {
            $calculadoraCientifica->addDataToConsole("9");
        } else if (isset($_POST['multiplicacion'])) {
            $calculadoraCientifica->addDataToConsole("*");
        } else if (isset($_POST['factorial'])) {
            $calculadoraCientifica->factorial();
        } else if (isset($_POST['4'])) {
            $calculadoraCientifica->addDataToConsole("4");
        } else if (isset($_POST['5'])) {
            $calculadoraCientifica->addDataToConsole("5");
        } else if (isset($_POST['6'])) {
            $calculadoraCientifica->addDataToConsole("6");
        } else if (isset($_POST['resta'])) {
            $calculadoraCientifica->addDataToConsole("-");
        } else if (isset($_POST['1'])) {
            $calculadoraCientifica->addDataToConsole("1");
        } else if (isset($_POST['2'])) {
            $calculadoraCientifica->addDataToConsole("2");
        } else if (isset($_POST['3'])) {
            $calculadoraCientifica->addDataToConsole("3");
        } else if (isset($_POST['suma'])) {
            $calculadoraCientifica->addDataToConsole("+");
        } else if (isset($_POST['parentesisIz'])) {
            $calculadoraCientifica->addDataToConsole("(");
        } else if (isset($_POST['parentesisDer'])) {
            $calculadoraCientifica->addDataToConsole(")");
        } else if (isset($_POST['0'])) {
            $calculadoraCientifica->addDataToConsole("0");
        } else if (isset($_POST['punto'])) {
            $calculadoraCientifica->addDataToConsole(".");
        } else if (isset($_POST['igual'])) {
            $calculadoraCientifica->compute();
        }
    }

    // $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
    echo "<form action='#' method='post' name='CalculadoraCientifica'>
            <input type='text' id='result' title='result' name='expr' value='$calculadoraCientifica->console' readonly />

            <input type='submit' class='button' name='mrc' value='mrc'/>
            <input type='submit' class='button' name='mMenos' value='m-'/>
            <input type='submit' class='button' name='mMas' value='m+'/>
            <input type='submit' class='button' name='potenciaCuadrado' value='x^2'/>
            <input type='submit' class='button' name='sin' value='sin'/>
            <input type='submit' class='button' name='cos' value='cos'/>
            <input type='submit' class='button' name='tan' value='tan'/>
            <input type='submit' class='button' name='raiz' value='√'/>
            <input type='submit' class='button' name='log' value='log'/>
            <input type='submit' class='button' name='C' value='C'/>
            <input type='submit' class='button' name='division' value='/'/>
            <input type='submit' class='button' name='pi' value='π'/>
            <input type='submit' class='button' name='7' value='7'/>
            <input type='submit' class='button' name='8' value='8'/>
            <input type='submit' class='button' name='9' value='9'/>
            <input type='submit' class='button' name='multiplicacion' value='*'/>
            <input type='submit' class='button' name='factorial' value='n!'/>
            <input type='submit' class='button' name='4' value='4'/>
            <input type='submit' class='button' name='5' value='5'/>
            <input type='submit' class='button' name='6' value='6'/>
            <input type='submit' class='button' name='resta' value='-'/>
            <input type='submit' class='button' name='1' value='1'/>
            <input type='submit' class='button' name='2' value='2'/>
            <input type='submit' class='button' name='3' value='3'/>
            <input type='submit' class='button' name='suma' value='+'/>
            <input type='submit' class='button' name='parentesisIz' value='('/>
            <input type='submit' class='button' name='parentesisDer' value=')'/>
            <input type='submit' class='button' name='0' value='0'/>
            <input type='submit' class='button' name='punto' value='.'/>
            <input type='submit' class='button' name='igual' value='='/>
        </form>"
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
