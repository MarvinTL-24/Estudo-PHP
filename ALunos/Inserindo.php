<?php
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$senha = md5($senha); // Nota: md5 não é recomendado para senhas, considere usar bcrypt ou Argon2
$imagem = file_get_contents($_FILES['imagem']['tmp_name']); // Lembre-se de que você não precisa disso, se estiver apenas salvando o caminho da imagem

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'bd_senac'); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $pasta = 'imagens/'; // Certifique-se de que essa pasta existe e tem permissões de escrita
    $imagemNome = basename($_FILES['imagem']['name']);
    $imagemPath = $pasta . uniqid() . '_' . $imagemNome; // Gera um nome único para evitar conflitos

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagemPath)) {
        // Inserir o caminho da imagem no banco de dados
        $sql = "INSERT INTO alunos (nome, senha, imagem) VALUES ('$nome', '$senha', '$imagemPath')";
        
        if (mysqli_query($conn, $sql)) { 
            session_start();
            if (mysqli_affected_rows($conn)) {   
                $_SESSION["insert"] = "1";
                header('Location: Alunos.html.php');
            } else {   
                $_SESSION["insert"] = "2";
                header('Location: Alunos.html.php');
            }  
        } else {
            echo "Falha no comando SQL.";
        }
    }  
}
?>
