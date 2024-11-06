<?php
$notas=[6,8,9,5,10];
/*echo"$notas[3]";
$notas[3] = 10;
echo "<br>$notas[3]";*/
$soma = 0;
for($i = 0; $i < count($notas); $i++){
    $soma += $notas[$i];
}
echo" Soma: $soma";

?>