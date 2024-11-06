<?php

$inicial = $_POST["inicial"];
$final = $_POST["final"];
$num = 0;


while ($num <= $final) 
{
    $resultado = $inicial * $num;
    echo "$inicial x $num = $resultado <br>";
    $num += 1;
} 
?>
