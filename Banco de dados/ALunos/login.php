<?php

$nome = $_POST["nome"];
$senha = $_POST["senha"];
$senha = md5($senha);

include_once("Conectar.php");
$sql = "SELECT * FROM  alunos WHERE nome = '$nome' AND senha= '$senha' ";

$result = mysqli_query($conn,$sql);
if(mysqli_fetch_array($result)){
        header('Location: gerenciar.html.php');
    }else{
        session_start(); 
        $_SESSION["login"] = "2";
        header('Location: login.html.php');
    }

?>