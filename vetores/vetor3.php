<?php

$notas= array(
    "n1"=> 10,
    "n2"=> 20,
    "n3"=> 40,
    "n4"=> 30
);
$soma =array_sum($notas);
$media = $soma/count($notas);
foreach($notas as $k => $v) {
    echo"$k: $v. <br>";
}
echo"Soma: $soma <br>";
echo "Media: $media";
?>