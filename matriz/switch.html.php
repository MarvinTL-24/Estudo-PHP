<?php
session_start();
if (isset($_SESSION["calculadora"])) {
    echo "<script>alert('".$_SESSION["calculadora"]."');</script>";
    unset($_SESSION["calculadora"]); 
}

include_once"head.html.php";

echo "<body>
    <form action='switch.php' method='post' enctype='multipart/form-data'>
        <fieldset>
            <div class='card container mt-3'>
                <div class='mt-2'>
                    <h2 style='text-align:center;' class='mt-0'>CALCULADORA</h2>
                </div>  
                <label>Valor do numero 1:</label>
                <input type='text' name='numero1' required><br>
                <label>Valor do numero 2:</label>
                <input type='text' name='numero2' required><br>
                <label>Operação Matematica:</label>
                <select name='operador'>
                    <option value='escolha'>----escolha----</option>
                    <option value='soma'>Somar</option>
                    <option value='sub'>Subtrair</option>
                    <option value='mult'>Multiplicar</option>
                    <option value='div'>Dividir</option>
                </select>
                <input type='submit' value='Calcular'>
            </div>
        </fieldset>
    </form>
</body>";
?>
