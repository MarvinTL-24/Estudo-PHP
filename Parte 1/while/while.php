<?php

$inicial = $_POST["inicial"];
$final = $_POST["final"];

if ($inicial <= $final) 
{
    while ($inicial <= $final) 
    {
        echo"$inicial <br>";
        $inicial += 1;
    } 
}
else
{
    while ($inicial >= $final) 
    {
        echo"$inicial <br>";
        $inicial -= 1;
    } 
}
?>
