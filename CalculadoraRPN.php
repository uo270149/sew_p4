<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sofía Suárez Fernández UO270149" />
    <meta name="description" content="P4-Ejercicio3. Calculadora RPN." />
    <title>Calculadora Basica</title>
    <link rel="stylesheet" href="CalculadoraRPN.css" />
</head>

<body>
    <h1>Calculadora RPN</h1>

    <?php
    class Lifo
    {
        protected $stack;

        public function __construct()
        {
            $this->stack = array();
        }

        public function push($element)
        {
            array_unshift($this->stack, $element);
        }

        public function pop()
        {
            if ($this->isEmpty()) {
                throw new RuntimeException("Empty stack.");
            } else {
                return array_shift($this->stack);
            }
        }

        public function isEmpty()
        {
            return empty($this->stack);
        }

        public function getLast()
        {
            return current($this->stack);
        }

        public function getElementAt($pos)
        {
            return $this->stack[$pos];
        }

        public function getSize()
        {
            return count($this->stack);
        }

        public function resetStack()
        {
            $this->stack = array();
        }
    }

    class CalculadoraRPN
    {
        private $stack;
        public $stackValues;
        public $console;

        public function __construct()
        {
            $this->console = "";
            $this->stackValues = "";
            $this->stack = new Lifo(8);
        }

        public function getConsole()
        {
            return $this->console;
        }

        public function addDataToConsole($val)
        {
            $this->console .= $val;
        }

        public function push()
        {
            if ($this->console != "") {
                $this->stack->push($this->console);
                $this->delete();
            }
            $this->stackState();
        }

        public function delete()
        {
            $this->console = "";
        }

        public function stackState()
        {
            $this->stackValues = "";
            for ($i = ($this->stack->getSize() - 1); $i >= 0; $i--) {
                $this->stackValues .= $this->stack->getElementAt($i) . " ";
            }
        }

        public function deleteAll()
        {
            $this->console = "";
            $this->stack->resetStack();
            $this->stackState();
        }

        public function compute($val)
        {
            if ($this->stack->getSize() >= 2) {
                $expression = floatval($this->stack->pop());

                switch ($val) {
                    case "+":
                        $expression = $expression + floatval($this->stack->pop());
                        break;
                    case "-":
                        $expression = floatval($this->stack->pop()) - $expression;
                        break;
                    case "*":
                        $expression = $expression * floatval($this->stack->pop());
                        break;
                    case "/":
                        $expression = floatval($this->stack->pop()) / $expression;
                        break;
                    case "**":
                        $expression = $expression ** floatval($this->stack->pop());
                        break;
                }
                $this->stack->push($expression);
            }
            $this->stackState();
        }

        public function logaritmo()
        {
            $num = $this->stack->pop();
            $this->stack->push(log($num));
            $this->delete();
            $this->stackState();
        }

        public function seno()
        {
            $num = $this->stack->pop();
            $this->stack->push(sin($num));
            $this->delete();
            $this->stackState();
        }

        public function coseno()
        {
            $num = $this->stack->pop();
            $this->stack->push(cos($num));
            $this->delete();
            $this->stackState();
        }

        public function tangente()
        {
            $num = $this->stack->pop();
            $this->stack->push(tan($num));
            $this->delete();
            $this->stackState();
        }
    }

    if (!isset($_SESSION['calculadoraRPN'])) {
        $_SESSION['calculadoraRPN'] = new CalculadoraRPN();
    }
    $calculadoraRPN = $_SESSION['calculadoraRPN'];

    if (count($_POST) > 0) {
        if (isset($_POST['sin'])) {
            $calculadoraRPN->seno();
        } elseif (isset($_POST['cos'])) {
            $calculadoraRPN->coseno();
        } elseif (isset($_POST['tan'])) {
            $calculadoraRPN->tangente();
        } elseif (isset($_POST['log'])) {
            $calculadoraRPN->logaritmo();
        } elseif (isset($_POST['7'])) {
            $calculadoraRPN->addDataToConsole("7");
        } elseif (isset($_POST['8'])) {
            $calculadoraRPN->addDataToConsole("8");
        } elseif (isset($_POST['9'])) {
            $calculadoraRPN->addDataToConsole("9");
        } elseif (isset($_POST['/'])) {
            $calculadoraRPN->compute("/");
        } elseif (isset($_POST['4'])) {
            $calculadoraRPN->addDataToConsole("4");
        } elseif (isset($_POST['5'])) {
            $calculadoraRPN->addDataToConsole("5");
        } elseif (isset($_POST['6'])) {
            $calculadoraRPN->addDataToConsole("6");
        } elseif (isset($_POST['*'])) {
            $calculadoraRPN->compute("*");
        } elseif (isset($_POST['1'])) {
            $calculadoraRPN->addDataToConsole("1");
        } elseif (isset($_POST['2'])) {
            $calculadoraRPN->addDataToConsole("2");
        } elseif (isset($_POST['3'])) {
            $calculadoraRPN->addDataToConsole("3");
        } elseif (isset($_POST['-'])) {
            $calculadoraRPN->compute("-");
        } elseif (isset($_POST['0'])) {
            $calculadoraRPN->addDataToConsole("0");
        } elseif (isset($_POST['C'])) {
            $calculadoraRPN->delete();
        } elseif (isset($_POST['+'])) {
            $calculadoraRPN->compute("+");
        } elseif (isset($_POST['enter'])) {
            $calculadoraRPN->push();
        } elseif (isset($_POST['AC'])) {
            $calculadoraRPN->deleteAll();
        }
    }

    echo "<form action='#' method='post' name='Calculadora'>
            <input type='text' id='pila' title='pila' name='stack' value='$calculadoraRPN->stackValues' readonly/>
            <input type='text' id='result' title='result' name='expresion' value='$calculadoraRPN->console' readonly/>
            <input type='submit' class='button' name='sin' value='sin'/>
			<input type='submit' class='button' name='cos' value='cos'/>
			<input type='submit' class='button' name='tan' value='tan'/>
			<input type='submit' class='button' name='log' value='log'/>
			<input type='submit' class='button' name='7' value='7'/>
			<input type='submit' class='button' name='8' value='8'/>
			<input type='submit' class='button' name='9' value='9'/>
			<input type='submit' class='button' name='/' value='/'/>
			<input type='submit' class='button' name='4' value='4'/>
			<input type='submit' class='button' name='5' value='5'/>
			<input type='submit' class='button' name='6' value='6'/>
			<input type='submit' class='button' name='*' value='*'/>
			<input type='submit' class='button' name='1' value='1'/>
			<input type='submit' class='button' name='2' value='2'/>
			<input type='submit' class='button' name='3' value='3'/>
			<input type='submit' class='button' name='-' value='-'/>
			<input type='submit' class='button' name='0' value='0'/>
			<input type='submit' class='button' name=',' value='.'/>	
			<input type='submit' class='button' name='C' value='C'/>
			<input type='submit' class='button' name='+' value='+'/>
			<input type='submit' class='button' name='enter' value='Enter'/>
			<input type='submit' class='button' name='AC' value='AC'/>
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