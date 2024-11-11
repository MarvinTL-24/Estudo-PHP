<?php
include("def.php");

$n1 = $_POST["numero1"];
$n2 = $_POST["numero2"];
$operador = $_POST["operador"];

switch ($operador){
    case "soma":
        $msg = soma($n1, $n2);
        break;
    case "sub":
        $msg = subtracao($n1, $n2);
        break;
    case "mult":
        $msg = multiplicacao($n1, $n2);
        break;
    case "div":
        $msg = divisao($n1, $n2);
        break;
    default:
        $msg = "Operação invalida";
}
session_start();
$_SESSION["calculadora"] = $msg;
header('Location: switch.html.php');


?>