<?php
include("def.php");

$n1 = $_POST["numero1"];
$n2 = $_POST["numero2"];
$operador = $_POST["operador"];

switch ($operador){
    case "soma":
        soma($n1, $n2);
        break;
    case "sub":
        subtracao($n1, $n2);
        break;
    case "mult":
        multiplicacao($n1, $n2);
        break;
    case "div":
        divisao($n1, $n2);
        break;
    default:
        echo"Operação invalida";
}
?>