<?php
session_start();
if (isset($_SESSION["insert"])) {
    if ($_SESSION["insert"] == "1") {
        unset($_SESSION["insert"]);
        echo "<script>alert('Aluno editado com sucesso!!');</script>";
    } else if ($_SESSION["insert"] == "2") {
        unset($_SESSION["insert"]);
        echo "<script>alert('Erro ao tentar editar!!');</script>";
    }
}

include_once("head.html.php");
include_once("Conectar.php");

$id = $_POST["id"];  // Obtém o ID do aluno que deve ser editado

// Prepara a consulta para editar o aluno
$sql = "SELECT * FROM alunos WHERE Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $linha = $result->fetch_assoc();
    if ($linha) {
        $nome = htmlspecialchars($linha['nome']);
        $cpf = htmlspecialchars($linha['cpf']);
        $dataNascimento = htmlspecialchars($linha['dataNascimento']);
        $idAluno = $linha['Id'];

        echo "<body>
            <form action='Inserindo.php' method='post' enctype='multipart/form-data'>
                <fieldset>
                    <div class='card container mt-3'>
                        <div class='mt-2'>
                            <h2 style='text-align:center;' class='mt-0'>EDITAR CADASTRO DE ALUNO</h2>
                        </div>
                        <input type='hidden' name='id' value='" . $idAluno . "'>
                        
                        <label>Nome:</label>
                        <input type='text' name='nome' value='" . $nome . "' required><br>
                        
                        <label>CPF:</label>
                        <input type='text' name='cpf' pattern='[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}' placeholder='***.***.***-**' value='" . $cpf . "' required><br>
                                  
                        <label>Data de Nascimento:</label>
                        <input type='date' name='dataNascimento' value='" . $dataNascimento . "'><br>
                        
                        <div class='mb-3'>
                            <label>Escolha uma nova imagem: </label>
                            <input type='file' name='imagem' id='imagem' accept='image/jpeg,image/png,image/gif' class='form-control'>
                        </div>
                        
                        <input type='submit' value='EDITAR'>
                    </div>
                </fieldset>
            </form>
        </body>";
    }
} else {
    echo "Aluno não encontrado.";
}
?>
