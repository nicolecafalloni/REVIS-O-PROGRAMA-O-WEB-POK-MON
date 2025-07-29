<?php
include_once 'conexao.php';

$id     = $_POST['id'];
$nome   = $_POST['nome'];
$tipo   = $_POST['tipo'];
$vida   = $_POST['vida'];
$ataque = $_POST['ataque'];
$defesa = $_POST['defesa'];

$stmt = $conn->prepare("UPDATE cadastro SET nome = ?, tipo = ?, vida = ?, ataque = ?, defesa = ? WHERE id = ?");
$stmt->bind_param("ssiiii", $nome, $tipo, $vida, $ataque, $defesa, $id);

if ($stmt->execute()) {
    echo "OK";
} else {
    echo "Erro ao atualizar.";
}

$conn->close();
?>

<link rel="stylesheet" href="css/style.css">
