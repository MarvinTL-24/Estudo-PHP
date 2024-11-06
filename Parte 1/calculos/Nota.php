<?php

    $Trimestre1 = $_POST["Trimestre1"];
    $Trimestre2 = $_POST["Trimestre2"];
    $Trimestre3 = $_POST["Trimestre3"];
    $Trimestre4 = $_POST["Trimestre4"];

    $media = ($Trimestre1 + $Trimestre2 + $Trimestre3 + $Trimestre4) / 4; 
 
    if($media >= 7) {  
        echo "O aluno com a média de $media está aprovado.<br>";
    } else if ($media < 4) {
        echo "O aluno com a média de $media está reprovado.<br>";
    } else if ($media >= 4 && $media < 7) {  
        echo "O aluno com a média de $media está em NAF.<br>";
    }
?>
