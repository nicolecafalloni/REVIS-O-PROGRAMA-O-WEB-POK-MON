<?php
include_once 'conexao.php';

$pesquisa = isset($_GET['q']) ? trim($_GET['q']) : "";

$sql = "SELECT id, nome, tipo, vida, ataque, defesa, imagem FROM cadastro";

if ($pesquisa !== "") {
    $sql .= " WHERE nome LIKE '%" . $conn->real_escape_string($pesquisa) . "%'";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card-listagem'>";
        echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
        if (!empty($row["imagem"])) {
            echo "<img src='data:image/jpeg;base64," . base64_encode($row["imagem"]) . "' alt='" . htmlspecialchars($row["nome"]) . "' class='pokemon-image'>";
        }
        echo "<p><strong>Tipo:</strong> " . htmlspecialchars($row["tipo"]) . "</p>";
        echo "<p><strong>HP:</strong> " . htmlspecialchars($row["vida"]) . "</p>";
        echo "<p><strong>Ataque:</strong> " . htmlspecialchars($row["ataque"]) . "</p>";
        echo "<p><strong>Defesa:</strong> " . htmlspecialchars($row["defesa"]) . "</p>";
        echo "<div class='card-actions'>";
        echo "<button class='btn-editar'
                data-id='" . htmlspecialchars($row["id"]) . "'
                data-nome='" . htmlspecialchars($row["nome"]) . "'
                data-tipo='" . htmlspecialchars($row["tipo"]) . "'
                data-vida='" . htmlspecialchars($row["vida"]) . "'
                data-ataque='" . htmlspecialchars($row["ataque"]) . "'
                data-defesa='" . htmlspecialchars($row["defesa"]) . "'
            >Editar</button>";
        echo "
  <form action='excluir.php' method='POST' onsubmit='return confirm(\"Tem certeza que deseja excluir este Pokémon?\");' style='display:inline;'>
    <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>
    <button type='submit' class='btn-excluir'>Excluir</button>
  </form>
";

        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum Pokémon encontrado.</p>";
}

$conn->close();
?>