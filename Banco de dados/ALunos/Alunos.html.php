<?php
session_start();

// Verifica se há mensagens de sucesso ou erro na sessão
if (isset($_SESSION["insert"])) {
    if ($_SESSION["insert"] == "1") {
        unset($_SESSION["insert"]);
        echo "<script>alert('Aluno cadastrado com sucesso!');</script>";
    } elseif ($_SESSION["insert"] == "2") {
        unset($_SESSION["insert"]);
        echo "<script>alert('Erro ao tentar cadastrar!');</script>";
    }
}

include_once("head.html.php");  // Inclui o cabeçalho com o Bootstrap
include_once("Conectar.php");   // Inclui a conexão com o banco de dados

// Exibe o formulário
echo "
<body>
    <div class='container mt-5'>
        <form action='Inserindo.php' method='post' enctype='multipart/form-data'>
            <div class='card'>
                <div class='card-header text-center'>
                    <h2>Cadastro de Aluno</h2>
                </div>
                <div class='card-body'>
                    <div class='mb-3'>
                        <label for='nome' class='form-label'>Nome:</label>
                        <input type='text' name='nome' id='nome' class='form-control' required>
                    </div>
                    <div class='mb-3'>
                        <label for='cpf' class='form-label'>CPF:</label>
                        <input type='text' name='cpf' id='cpf' class='form-control' pattern='[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}' placeholder='***.***.***-**' required>
                    </div>
                    <div class='mb-3'>
                        <label for='senha' class='form-label'>Senha:</label>
                        <input type='password' name='senha' id='senha' class='form-control' required>
                    </div>
                    <div class='mb-3'>
                        <label for='dataNascimento' class='form-label'>Data de Nascimento:</label>
                        <input type='date' name='dataNascimento' id='dataNascimento' class='form-control'>
                    </div>
                    <div class='mb-3'>
                        <label for='imagem' class='form-label'>Escolha uma imagem:</label>
                        <input type='file' name='imagem' id='imagem' class='form-control' accept='image/*' required>
                    </div>
                    <button type='submit' class='btn btn-primary'>Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</body>
";

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

        // Verifica se o arquivo é uma imagem válida
        $infoImagem = getimagesize($_FILES['imagem']['tmp_name']);
        if ($infoImagem !== false) {
            // Tenta mover o arquivo para o diretório de uploads
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagemPath)) {
                // Recebe os dados do formulário
                $nome = $_POST["nome"];
                $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT); // Gera o hash da senha
                $cpf = $_POST["cpf"];
                $dataNascimento = $_POST["dataNascimento"];

                // Prepara a consulta SQL para inserir no banco de dados
                $sql = "INSERT INTO alunos (nome, senha, cpf, imagem, dataNascimento) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Erro na preparação da consulta: " . $conn->error);
                }

                // Faz o bind dos parâmetros e executa a consulta
                $stmt->bind_param("sssss", $nome, $senha, $cpf, $imagemPath, $dataNascimento);
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
                echo "Erro ao mover o arquivo para o diretório de uploads.";
            }
        } else {
            echo "O arquivo enviado não é uma imagem válida.";
        }
    } else {
        echo "Nenhum arquivo enviado ou houve erro no envio da imagem.";
    }
}
?>
