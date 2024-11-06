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

echo "<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Formulario dos Alunos</title>
    
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>

    <style>
        body {
            background-color: rgb(59, 204, 248);
            font-family: Arial, sans-serif;
        }

        fieldset {
            width: 30%;
            margin-inline: auto;
            margin-top: 10%;
            background-color: #bbdefb;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
        }

        label {
            text-align: center;
            margin-bottom: 2px;
            font-weight: bold;
        }

        input[type='text'], input[type='password'] {
            text-align: center;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #90caf9;
            border-radius: 5px;
            transition: border-color 0.3s;
            border-color: #0d47a1;
            outline: none;
        }

        input[type='submit'] {
            margin-top: 10px;
            padding: 8px 20px;
            background-color: rgb(241, 77, 12);
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type='submit']:hover {
            background-color: rgb(222, 235, 42);
        }
    </style>
</head>";

echo "<body>
    <form action='Inserindo.php' method='post' enctype='multipart/form-data'>
        <fieldset>
            <div class='card container mt-3'>
                <div class='mt-2'>
                    <h2 style='text-align:center;' class='mt-0'>CADASTRO DE ALUNO</h2>
                </div>  
                <label>Nome:</label>
                <input type='text' name='nome' required><br>
                <label>Senha:</label>
                <input type='password' name='senha' required><br>
                <div class='mb-3'>
                    <label>Escolha uma imagem: </label>
                    <input type='file' name='imagem' id='imagem' accept='image/*' class='form-control'>
                </div>
                <input type='submit' value='Cadastrar'>
            </div>
        </fieldset>
    </form>
</body>";
?>