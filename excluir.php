<?php
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    $stmt = $conn->prepare("DELETE FROM cadastro WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "sucesso";
    } else {
        echo "erro";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "erro";
}
?>
