<?php
include_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT imagem FROM cadastro WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Content-Type: image/png"); // ou image/jpeg, conforme o tipo da imagem salva
        echo $row['imagem'];
    } else {
        // imagem não encontrada
        http_response_code(404);
    }
}

$conn->close();
?>
