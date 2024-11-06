<?php
echo"<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Formulario dos Alunos</title>
    
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    
    <script src='https://code.jquery.com/jquery-5.0.2.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>

    <style>
        body{
            background-color: rgb(59, 204, 248);
            font-family: Arial, sans-serif;
        }

        fieldset{
            width: 30%;
            margin-inline: auto;
            margin-top: 10%;
            background-color: #bbdefb;;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
        }

        label {
            text-align:center
            margin-bottom: 2px;
            font-weight: bold;
        }

        input[type] {
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

?>