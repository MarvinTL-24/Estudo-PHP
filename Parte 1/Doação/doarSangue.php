<?php

    $Idade = $_POST["Idade"];

    if ($Idade >= "18" && $Idade <= "68" )
    {  
        echo"Você pode doar sangue <br>";
    }
    else
    {
        echo"Você não é capacitado para doar sangue <br>";
    }
?>