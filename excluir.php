<?php
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM cadastro WHERE id = $id";

    if ($conn->query($sql)) {
        // Redireciona de volta para a página principal com mensagem
        header("Location: index.php?msg=excluido");
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
