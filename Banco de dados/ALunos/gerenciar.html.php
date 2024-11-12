<?php
include_once("head.html.php");
include_once("Conectar.php");

$sql = "SELECT * FROM alunos";
$result = mysqli_query($conn, $sql);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    // Cabeçalho
    echo "<div class='container card mt-2'>
    <h2 class='text-center'>Lista de Alunos</h2>
    <a class='btn btn-success mt-2 mb-2' href='Adicionar.html.php'>
    <i class='bi bi-person-fill-add'></i> Cadastrar
    </a>

    <table class='table table-striped table-sm'>
    <tr>
        <th>Id</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>DATA DE NASCIMENTO</th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>";

    // Exibe os alunos na tabela
    while ($linha = mysqli_fetch_array($result)) {
        echo " 
        <tr>
        <td>{$linha['Id']}</td>
        <td>{$linha['nome']}</td>
        <td>{$linha['cpf']}</td>
        <td>{$linha['dataNascimento']}</td>
        <td>
        <form action='Editar.html.php' method='post'>
            <input type='hidden' name='id' value='{$linha['Id']}'>
            <button class='btn btn-warning' type='submit'>
                <i class='bi bi-pencil-square'></i> Editar
            </button>
        </form>
        </td>
        <td>
        <form action='deletar.php' method='post'>
            <input type='hidden' name='id' value='{$linha['Id']}'>
            <button class='btn btn-danger' type='submit'>
                <i class='fa fa-trash'></i> Deletar
            </button>
        </form>
        </td>
        </tr>";
    }
    echo "</table>";
}
?>
