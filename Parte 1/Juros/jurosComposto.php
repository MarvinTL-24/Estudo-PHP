<?php
    $capital = $_POST["capital"];
    $taxa    = $_POST["taxa"];
    $tempo   = $_POST["tempo"];

    echo "Capital: $capital <br>";
    echo "Taxa: $taxa <br>";
    echo "Tempo: $tempo <br>";

    $montante = $capital * pow(1+$taxa, $tempo);
    // Pode usar tambem da seguinte maneira: $montante = $capital * (1+$taxa) ** $tempo;
    echo "Montante: $montante <br>";
?>