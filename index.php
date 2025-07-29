<?php
include_once 'conexao.php';

// Verifica se há uma pesquisa
$pesquisa = "";
if (isset($_GET['buscar'])) {
    $pesquisa = trim($_GET['buscar']);
}

// Prepara a consulta SQL com ou sem filtro
if ($pesquisa != "") {
    $sql = "SELECT 
                nome,
                tipo,
                localizacao,
                DATE_FORMAT(data_registro, '%d/%m/%Y') AS data_registro,
                vida,
                ataque,
                defesa,
                observacoes
            FROM cadastro
            WHERE nome LIKE '%" . $conn->real_escape_string($pesquisa) . "%'";
} else {
    $sql = "SELECT 
                nome,
                tipo,
                localizacao,
                DATE_FORMAT(data_registro, '%d/%m/%Y') AS data_registro,
                vida,
                ataque,
                defesa,
                observacoes
            FROM cadastro";
}

$result = $conn->query($sql);
// Consulta SQL
$sql = "SELECT 
            nome,
            tipo,
            localizacao,
            DATE_FORMAT(data_registro, '%d/%m/%Y') AS data_registro,
            vida,
            ataque,
            defesa,
            observacoes
        FROM cadastro";

$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    echo "<h2>Pokémons Encontrados</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Localização</th>
            <th>Data do Registro</th>
            <th>HP</th>
            <th>Ataque</th>
            <th>Defesa</th>
            <th>Observações</th>
          </tr>";

    // Exibe cada linha
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["tipo"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["localizacao"]) . "</td>";
        echo "<td>" . $row["data_registro"] . "</td>";
        echo "<td>" . $row["hp"] . "</td>";
        echo "<td>" . $row["ataque"] . "</td>";
        echo "<td>" . $row["defesa"] . "</td>";
        echo "<td>" . nl2br(htmlspecialchars($row["observacoes"])) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<script>alert('Nenhum Pokémon encontrado.');</script>";
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bitcount:wght@100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <img class="logo" src="img/logo-pokemon.png" alt="">
            <li id="espacamento-logo"><a href="index.php">Home</a></li>
            <li><a href="php/cadastrarPokemon.php">Cadastro</a></li>
        </ul>
    </nav>

</body>

</html>