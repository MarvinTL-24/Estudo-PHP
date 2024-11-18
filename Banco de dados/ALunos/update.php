<?php
session_start();
include_once("Conectar.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"] ?? null;
    $cpf = $_POST["cpf"] ?? null;
    $dataNascimento = $_POST["dataNascimento"] ?? null;
    $imagem = $_FILES["imagem"];

    // Valida se há uma nova imagem
    if ($imagem["erro"] === UPLOAD_ERR_OK) {
        $imagemPath = "uploads/" . basename($imagem["name"]);
        move_uploaded_file($imagem["tmp_name"], $imagemPath);
    } else {
        $imagemPath = null; // Caso não haja nova imagem
    }

    // Atualiza os dados no banco
    $sql = "UPDATE alunos SET nome = ?, cpf = ?, dataNascimento = ?" . 
           ($imagemPath ? ", imagem = ?" : "") . " WHERE Id = ?";
    $stmt = $conn->prepare($sql);

    if ($imagemPath) {
        $stmt->bind_param("ssssi", $nome, $cpf, $dataNascimento, $imagemPath, $id);
    } else {
        $stmt->bind_param("sssi", $nome, $cpf, $dataNascimento, $id);
    }

    if ($stmt->execute()) {
        $_SESSION["update"] = "sucesso";
    } else {
        $_SESSION["update"] = "erro";
    }

    header("Location: editar.html.php");
    exit();
}
?>
