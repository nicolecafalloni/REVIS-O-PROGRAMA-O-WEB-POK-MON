<?php
include_once 'conexao.php';

$pesquisa = "";
if (isset($_GET['buscar'])) {
    $pesquisa = trim($_GET['buscar']);
}

$sql = "SELECT 
            nome,
            tipo,
            vida,
            ataque,
            defesa
        FROM cadastro";

if ($pesquisa !== "") {
    $sql .= " WHERE nome LIKE '%" . $conn->real_escape_string($pesquisa) . "%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Pokémons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <img class="logo" src="img/logo-pokemon.png" alt="Logo Pokémon">
            <li id="espacamento-logo"><a href="index.php">Home</a></li>
            <li><a href="php/cadastrarPokemon.php">Cadastro</a></li>
        </ul>
    </nav>


    <div class="container">
        <form method="GET" class="search-form">
            <input type="text" name="buscar" placeholder="Buscar Pokémon pelo nome" value="<?= htmlspecialchars($pesquisa) ?>">
            <button type="submit">Buscar</button>
        </form>

        <div class="card-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card-listagem'>";
                    echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
                    echo "<p><strong>Tipo:</strong> " . htmlspecialchars($row["tipo"]) . "</p>";
                    echo "<p><strong>HP:</strong> " . htmlspecialchars($row["vida"]) . "</p>";
                    echo "<p><strong>Ataque:</strong> " . htmlspecialchars($row["ataque"]) . "</p>";
                    echo "<p><strong>Defesa:</strong> " . htmlspecialchars($row["defesa"]) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum Pokémon encontrado.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>
