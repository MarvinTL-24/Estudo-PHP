<?php
// Recebe os dados do formulário
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$dataNascimento = $_POST["dataNascimento"]; // Recebe a data de nascimento
$senha = password_hash($senha, PASSWORD_BCRYPT); // Usa bcrypt para fazer o hash da senha

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'bd_senac'); 

// Verifica se há erro na conexão com o banco de dados
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Verifica se a imagem ou arquivo foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Configurações de upload
        $pasta = 'uploads/'; // Certifique-se de que a pasta existe e tem permissões de escrita
        $imagemNome = basename($_FILES['imagem']['name']);
        $imagemPath = $pasta . uniqid() . '_' . $imagemNome; // Gera um nome único para evitar conflitos

        // Verificar se o arquivo enviado é realmente uma imagem
        $infoImagem = getimagesize($_FILES['imagem']['tmp_name']);
        
        if ($infoImagem !== false) {
            // O arquivo é uma imagem
            // Verificar o tamanho do arquivo (opcional)
            $tamanhoMaximo = 10 * 1024 * 1024; // Limite de 10 MB
            if ($_FILES['imagem']['size'] <= $tamanhoMaximo) {
                // Move o arquivo para o diretório de destino
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagemPath)) {
                    // Prepara a consulta SQL com prepared statements para evitar SQL injection
                    $stmt = $conn->prepare("INSERT INTO alunos (nome, senha, cpf, imagem, dataNascimento) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $nome, $senha, $cpf, $imagemPath, $dataNascimento);
                    
                    // Executa a consulta
                    if ($stmt->execute()) {
                        session_start();
                        $_SESSION["insert"] = "1"; // Registro bem-sucedido
                        header('Location: Alunos.html.php');
                        exit;
                    } else {
                        // Em caso de falha na execução da consulta
                        $_SESSION["insert"] = "2"; // Erro ao registrar
                        header('Location: Alunos.html.php');
                        exit;
                    }
                } else {
                    echo "Erro ao mover o arquivo para o diretório.";
                }
            } else {
                echo "O arquivo enviado excede o limite de tamanho permitido (10 MB).";
            }
        } else {
            echo "O arquivo enviado não é uma imagem válida.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}
?>
