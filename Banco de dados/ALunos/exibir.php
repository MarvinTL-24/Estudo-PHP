<?php
include_once("Conectar.php");
include_once("head.html.php");

// Obtém o ID passado pela URL ou outro método
$id = $_GET['id'] ?? null;

if ($id) {
    // Prepara a consulta SQL usando o ID recebido
    $sql = "SELECT * FROM alunos WHERE Id = 303";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id); // Liga o parâmetro ID à consulta
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $linha = $resultado->fetch_assoc()) {
            // Sanitiza os dados obtidos
            $imagem = htmlspecialchars($linha['imagem']);
            $nome = htmlspecialchars($linha['nome']);
            $cpf = htmlspecialchars($linha['cpf']);
            $dataNascimento = htmlspecialchars($linha['dataNascimento']);
            
            // Exibe as informações do aluno
            echo "
            <div class='row'>
                <div class='card col-xl-3 m-3 p-3'>
                    <img src='$imagem' class='card-img-top' alt='Imagem do aluno'>
                    <div class='card-body'>
                        <h5 class='card-title'>$nome</h5>
                        <p class='card-text'>
                            <i class='far fa-address-card'></i>
                            <i>CPF: $cpf</i><br>
                            <i class='far fa-address-card'></i>
                            <i>Nascimento: $dataNascimento</i><br>
                        </p>
                    </div>
                </div>
            </div>";
        } else {
            echo "<p>Aluno não encontrado.</p>";
        }
    } else {
        echo "<p>Erro ao preparar a consulta SQL.</p>";
    }
} else {
    echo "<p>ID inválido ou não fornecido.</p>";
}
?>
