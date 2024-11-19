<?php

include_once("head.html.php");

class Calculadora{
    //CARACTERISTICAS
    public  $n1 = 0;
    public  $n2 = 0;
    //AÇÕES
    public function soma($valor1, $valor2){
        $n1 = $valor1;
        $n2 = $valor2;
        $soma = $n1 + $n2;
        return $soma;
    }
    public function Subtrair($valor1, $valor2){
        $n1 = $valor1;
        $n2 = $valor2;
        $subtrair = $n1 - $n2;
        return $subtrair;
    }
    public function Multiplicar($valor1, $valor2){
        $n1 = $valor1;
        $n2 = $valor2;
        $multiplicar = $n1 * $n2;
        return $multiplicar;
    }
    public function Dividir($valor1, $valor2){
        $n1 = $valor1;
        $n2 = $valor2;
        $dividir = $n1 / $n2;
        return $dividir;
    }
}
?>