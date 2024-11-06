<?php
 $notas= array(
    array(8,9,10),  
    array(5,7,8),
    array(10,8,5)
 );
for($i= 0; $i<count($notas);$i++){
    for($j= 0; $j<count($notas[$i]); $j++){
        echo $notas[$i][$j]." ";
    }
    echo"<br>";
}

?>