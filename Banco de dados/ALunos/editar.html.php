<?php
session_start();

if (isset($_SESSION["update"])) {
    if ($_SESSION["update"] == "success") {
        unset($_SESSION["update"]);
        echo "<script>alert('Aluno atualizado com sucesso!');</script>";
    } elseif ($_SESSION["update"] == "error") {
        unset($_SESSION["update"]);
        echo "<script>alert('Erro ao atualizar o aluno!');</script>";
    }
}

include_once("head.html.php");
include_once("Conectar.php");

$id = $_POST["id"];

// Prepara a consulta para buscar o aluno
$sql = "SELECT * FROM alunos WHERE Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $linha = $result->fetch_assoc();

    $nome = htmlspecialchars($linha['nome'] ?? "");
    $cpf = htmlspecialchars($linha['cpf'] ?? "");
    $dataNascimento = htmlspecialchars($linha['dataNascimento'] ?? "");
    $idAluno = $linha['Id'];
    ?>
    <body>
        <form action="Inserindo.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="card container mt-3">
                    <div class="mt-2">
                        <h2 style="text-align:center;" class="mt-0">EDITAR CADASTRO DE ALUNO</h2>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $idAluno; ?>">

                    <label>Nome:</label>
                    <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

                    <label>CPF:</label>
                    <input type="text" name="cpf" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" placeholder="***.***.***-**" value="<?php echo $cpf; ?>" required><br>

                    <label>Data de Nascimento:</label>
                    <input type="date" name="dataNascimento" value="<?php echo $dataNascimento; ?>"><br>

                    <div class="mb-3">
                        <label>Escolha uma nova imagem:</label>
                        <input type="file" name="imagem" id="imagem" accept="image/*" class="form-control">
                    </div>

                    <input type="submit" value="EDITAR">
                </div>
            </fieldset>
        </form>
    </body>
    <?php
} else {
    echo "Aluno não encontrado.";
}
?>
