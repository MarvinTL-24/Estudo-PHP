<?php
session_start();
if (isset($_SESSION["insert"])) {
    $message = "";
    if ($_SESSION["insert"] == "1") {
        $message = "Aluno cadastrado com sucesso!!";
    } else if ($_SESSION["insert"] == "2") {
        $message = "Erro ao tentar cadastrar!!";
    }
    unset($_SESSION["insert"]);
    if ($message != "") {
        echo "<script>alert('$message');</script>";
    }
}

include_once("head.html.php");
include_once("Conectar.php");

// Formulário de cadastro
echo "<body>
    <form action='Inserindo.php' method='post' enctype='multipart/form-data'>
        <fieldset>
            <div class='card container mt-3'>
                <div class='mt-2'>
                    <h2 style='text-align:center;' class='mt-0'>CADASTRO DE ALUNO</h2>
                </div>  
                <label>Nome:</label>
                <input type='text' name='nome' required><br>
                <label>CPF:</label>
                <input type='text' name='cpf' pattern='[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}' placeholder='***.***.***-**' required><br>
                <label>Senha:</label>
                <input type='password' name='senha' required><br>
                <label>Data de Nascimento:</label>
                <input type='date' name='dataNascimento'><br>
                <div class='mb-3'>
                    <label>Escolha uma imagem: </label>
                    <input type='file' name='imagem' id='imagem' accept='image/jpeg,image/png,image/gif' class='form-control'>
                </div>
                <div class='text-center mt-4'>
                    <input type='submit' value='Cadastrar' class='btn btn-primary'>
                </div>
            </div>
        </fieldset>
    </form>
</body>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se a imagem foi carregada corretamente
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Define o diretório para upload
        $pasta = 'uploads/';
        
        // Verifica se o diretório existe, se não, cria
        if (!is_dir($pasta)) {
            if (!mkdir($pasta, 0777, true)) {
                die('Falha ao criar diretório de uploads.');
            }
        }

        // Gerar um nome único para o arquivo
        $imagemNome = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $imagemPath = $pasta . $imagemNome;

        // Tenta mover o arquivo para o diretório de uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagemPath)) {
            // Recebe os dados do formulário
            $nome = $_POST["nome"];
            $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT); // Gera o hash da senha
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $dataNascimento = $_POST["dataNascimento"];

            // Prepara a consulta SQL para inserir no banco de dados
            $sql = "INSERT INTO alunos (nome, senha, cpf, email, imagem, dataNascimento) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Erro na preparação da consulta: " . $conn->error);
            }

            // Faz o bind dos parâmetros e executa a consulta
            $stmt->bind_param("ssssss", $nome, $senha, $cpf, $email, $imagemPath, $dataNascimento);
            if ($stmt->execute()) {
                $_SESSION["insert"] = "1"; // Sucesso
                header('Location: Alunos.html.php');
                exit;
            } else {
                $_SESSION["insert"] = "2"; // Erro
                header('Location: Alunos.html.php');
                exit;
            }
        } else {
            echo "Erro ao mover o arquivo para o diretório.";
        }
    } else {
        echo "Nenhum arquivo enviado ou houve erro no envio da imagem.";
    }
}
?>
