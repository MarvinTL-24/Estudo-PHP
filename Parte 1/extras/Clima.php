<?php

    $Saldo = $_POST["Saldo"];
    $Clima = $_POST["clima"];

    echo "Com o seu Saldo de $Saldo e o clima atual sendo $Clima devemos recomendar: . <br>";

    if($Clima == "verão"  && $Saldo >= 1400)
    {  
        echo "Que faça uma programação personalizada de esportes em nosso dominio. <br>";
    }
    elseif ($Clima == "verão"  && $Saldo < 1400)
    { 
        echo "Que escolha esportes em nosso dominio que tenham mais de 1 participante. <br>";
    }
    elseif($Clima == "inverno"  && $Saldo >= 1400)
    {  
        echo "Que no clima atual deve-se procurar um instrutor e o plano sera modificado em nosso dominio. <br>";
    }
    elseif ($Clima == "inverno"  && $Saldo < 1400)
    { 
        echo "Que procure outros tipos de atividades em outros recintos para sua melhor experiência. <br>";
    }
?>