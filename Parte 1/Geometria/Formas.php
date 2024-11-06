<?php

    $forma = $_POST["Forma"];
    $Base = $_POST["Base"];
    $Altura = $_POST["Altura"];

    if($forma == "Retangulo")
    {  
        $Area = ($Base * $Altura) /2;
        echo "Area do Retângulo é $Area centimetros. <br>";
    }else
    { 
        $Area = ($Base * $Altura) /2;
        echo "Area do Triangulo é $Area centimetros. <br>";
    }
?>