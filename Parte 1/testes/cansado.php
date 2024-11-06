<?php

    $Combustivel = $_POST["Combustivel"];
    $Litros = $_POST["Quantidade"];

    if ($Combustivel == "Alcool" && $Litros <= 20)
    {  
        $Desconto1 = $Litros * 0.03;
        echo"O desconto do Alcool é de 3% ao litro será de R$ $Desconto1 reais por Litro <br>";
    }
    elseif ($Combustivel == "Alcool" && $Litros > 20)
    {  
        $Desconto2 = $Litros * 0.05;
        echo"O desconto do Alcool é de 5% ao litro será de R$ $Desconto2 reais por Litro <br>";
    }
    elseif ($Combustivel == "Gasolina" && $Litros <= 20)
    {  
        $Desconto3 = $Litros * 0.04;
        echo"O desconto da Gasolina é de 4% ao litro será de R$ $Desconto3 reais por Litro <br>";
    }
    elseif ($Combustivel == "Gasolina" && $Litros > 20)
    {  
        $Desconto4 = $Litros * 0.06;
        echo"O desconto da Gasolina é de 6% ao litro será de R$ $Desconto4 reais por Litro <br>";
    }
   
?>