<?php
include_once("Conectar.php");

// Verifica se o ID foi enviado via POST
if (isset($_POST["id"])) {
    $id = $_POST["id"];  // Obtém o ID do aluno que deve ser excluído

    // Prepara a consulta para excluir o aluno
    $stmt = $conn->prepare("DELETE FROM alunos WHERE Id = ?");
    $stmt->bind_param("i", $id); // O tipo "i" indica que o parâmetro é um inteiro

    // Executa a consulta
    if ($stmt->execute()) {
        // Verifica se alguma linha foi afetada (excluída)
        if ($stmt->affected_rows > 0) {
            // Sucesso, redireciona com mensagem
            session_start();
            $_SESSION["mensagem"] = "Aluno excluído com sucesso!";
        } else {
            // Se nenhuma linha foi afetada, significa que o ID não foi encontrado
            session_start();
            $_SESSION["mensagem"] = "Aluno não encontrado ou já excluído.";
        }
    } else {
        // Caso ocorra um erro na execução da consulta
        session_start();
        $_SESSION["mensagem"] = "Erro ao tentar excluir o aluno.";
    }

    // Redireciona para a lista de alunos após a exclusão
    header("Location: gerenciar.html.php");  // Ou para a página que exibe a lista de alunos
    exit;
}
?>
