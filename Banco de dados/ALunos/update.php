<?php
session_start();
include_once("Conectar.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento']; // Incluindo o campo data de nascimento para edição

// Preparar a consulta para atualizar o aluno (sem alterar a imagem)
$sql = "UPDATE alunos SET nome = ?, cpf = ?, dataNascimento = ? WHERE Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nome, $cpf, $dataNascimento, $id);

/*
// Executar a consulta para atualizar os dados do aluno
if ($stmt->execute()) {
    // Verificar se foi feito upload de uma nova imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Configurações de upload de imagem
        $pasta = 'uploads/';
        $imagemNome = basename($_FILES['imagem']['name']);
        $imagemPath = $pasta . uniqid() . '_' . $imagemNome;

        // Mover o arquivo para o diretório de uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagemPath)) {
            // Atualizar o caminho da imagem no banco de dados
            $sqlImagem = "UPDATE alunos SET imagem = ? WHERE Id = ?";
            $stmtImagem = $conn->prepare($sqlImagem);
            $stmtImagem->bind_param("si", $imagemPath, $id);
            $stmtImagem->execute();
        } else {
            $_SESSION["insert"] = "2"; // Erro ao carregar imagem
            header('Location: editarAluno.php');
            exit;
        }
    }
*/
if ($stmt->execute()) {
    $_SESSION["insert"] = "1"; // Sucesso na edição
        header('Location: editarAluno.php'); // Redireciona para a página de edição ou lista
    exit;
    } else {
    $_SESSION["insert"] = "2"; // Erro na edição
    header('Location: editarAluno.php'); // Redireciona em caso de erro
    exit;
    }
?>
