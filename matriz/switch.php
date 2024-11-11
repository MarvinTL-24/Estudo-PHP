<?php
$n1 = $_POST["numero1"];
$n2 = $_POST["numero2"];
$operador = $_POST["operador"];

switch ($operador){
    case "soma":
        $resultado = $n1 + $n2;
        echo"Soma = $resultado";
        break;
    case "sub":
        $resultado = $n1 - $n2;
        echo "Subtração = $resultado";
        break;
    case "mult":
        $resultado = $n1 * $n2;
        echo "Multiplicação = $resultado";
        break;
    case "div":
        $resultado = $n1 / $n2;
        echo "Divisão = $resultado";
        break;
    default:
        echo"Operação invalida";
}
?>