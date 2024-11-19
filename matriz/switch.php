<?php
include("calculadora.php");

$n1 = $_POST["numero1"];
$n2 = $_POST["numero2"];
$operador = $_POST["operador"];

//CRIAÇÃO DO OBJETO DA CLASSE CALCULADORA
$c1 = new Calculadora();

$msg = "Valor da operação foi:";
switch ($operador){
    case "soma":
        $msg = $c1->soma($n1, $n2);
        break;
    case "sub":
        $msg = $c1->subtrair($n1, $n2);
        break;
    case "mult":
        $msg = $c1->multiplicar($n1, $n2);
        break;
    case "div":
        $msg = $c1->dividir($n1, $n2);
        break;
    default:
        $msg = "Operação invalida";
}
session_start();
$_SESSION["calculadora"] = $msg;
header('Location: switch.html.php');


?>