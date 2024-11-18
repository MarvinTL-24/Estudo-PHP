<?php
session_start();

if (isset($_SESSION["insert"])) {
    if ($_SESSION["insert"] == "1") {
        unset($_SESSION["insert"]);
        echo "<script>alert('Aluno cadastrado com sucesso!!');</script>";
    } elseif ($_SESSION["insert"] == "2") {
        unset($_SESSION["insert"]);
        echo "<script>alert('Erro ao tentar cadastrar!!');</script>";
    }
}
include_once("head.html.php");
include_once("Conectar.php");

echo "<body>
    <form action='Inserindo.php' method='post'>
        <fieldset>
            <div class='card container mt-3'>
                <div class='mt-2'>
                    <h2 style = 'text-align:center;'class='mt-0'>CADASTRO DE ALUNO</h2>
                </div>  
                <label>Nome:</label>
                <input type='text' name='nome' id='nome' class='form-control' required>
                <label>CPF:</label>
                 <input type='text' name='cpf' id='cpf' class='form-control' pattern='[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}' placeholder='***.***.***-**' required>
                <label>Senha:</label>
                <input type='password' name='senha' id='senha' class='form-control' required>
                <label>Data de Nascimento:</label>
                <input type='date' name='dataNascimento' id='dataNascimento' class='form-control'>
                <div class='mb-3' class='form-group'>
                    <label>Escolha uma imagem: </label>
                    <input type='file' name='imagem' id='imagem' accept='image/*' class='form-control'>
                </div>
                <input type='submit' value='Cadastrar'>
            </div>
        </fieldset>
    </form>
</body>";
?>
