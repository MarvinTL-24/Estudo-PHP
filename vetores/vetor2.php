<?php

$dados = array(
    "Id"=> 1,
    "Nome"=> "Alan",
    "Valor"=> "50.00",
    "Codigo"=> "012345098",
    "Tamanho"=> "G"
);

//Foreach - Forma de demonstrar todo o vetor.
//$key é só forma de identificar as variaveis como ID,etc.
//$valor é só a variavel resultante do dado, pode nomea-la da maneira que desejar.
foreach ($dados as $key => $valor) {
    echo"$key: $valor<br>";
}
?>