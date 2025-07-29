<?php

include_once '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $tipo2 = $_POST['tipo2']; // pode estar vazio
    $localizacao = $_POST['localizacao'];
    $data_registro = $_POST['data_registro'];
    $vida = $_POST['vida'];
    $ataque = $_POST['ataque'];
    $defesa = $_POST['defesa'];
    $observacoes = $_POST['observacoes'];
    $imagem = $_POST['imagem'];

    // Define tipo2 como NULL se estiver vazio
    $tipo2 = empty($tipo2) ? null : $tipo2;

    $sql = "INSERT INTO cadastro (nome, tipo, tipo2, localizacao, data_registro, vida, ataque, defesa, observacoes, imagem)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiisss", $nome, $tipo, $tipo2, $localizacao, $data_registro, $vida, $ataque, $defesa, $observacoes, $imagem);


    if ($stmt->execute()) {
        echo "<script>alert('Pokémon cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar Pokémon: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pokémon</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bitcount:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">


</head>

<body>
    <nav>
        <ul>
            <img class="logo" src="../img/logo-pokemon.png" alt="">
            <li id="espacamento-logo"><a href="../index.php">Home</a></li>
            <li><a href="php/cadastrarPokemon.php">Cadastro</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1 class="text-principal">
            CADASTRAR POKÉMON
        </h1>
    </div>

    <div class="alinha-card">
        <div class="card">
            <form action="" method="POST">
                <label for="nome">Nome:</label>
                <input class="input-form" type="text" id="nome" name="nome" required>

                <label for="tipo">Tipo 1:</label>
                <select class="input-form" id="tipo" name="tipo" required>
                    <option value="">Selecione o tipo</option>
                    <option value="Normal">Normal</option>
                    <option value="Fogo">Fogo</option>
                    <option value="Água">Água</option>
                    <option value="Grama">Grama</option>
                    <option value="Elétrico">Elétrico</option>
                    <option value="Gelo">Gelo</option>
                    <option value="Lutador">Lutador</option>
                    <option value="Venenoso">Venenoso</option>
                    <option value="Terrestre">Terrestre</option>
                    <option value="Voador">Voador</option>
                    <option value="Psíquico">Psíquico</option>
                    <option value="Inseto">Inseto</option>
                    <option value="Pedra">Pedra</option>
                    <option value="Fantasma">Fantasma</option>
                    <option value="Dragão">Dragão</option>
                    <option value="Sombrio">Sombrio</option>
                    <option value="Aço">Aço</option>
                    <option value="Fada">Fada</option>
                </select>


                <div class="tipo2">
                    <label for="tipo">Tipo 2:</label>
                    <p id="descricao-tipo2">(Se o pokemon não tiver 2 tipo, este campo pode estar em branco.)</p>
                </div>
                
                <select class="input-form" id="tipo2" name="tipo2">
                    <option value="">Selecione o tipo</option>
                    <option value="Normal">Normal</option>
                    <option value="Fogo">Fogo</option>
                    <option value="Água">Água</option>
                    <option value="Grama">Grama</option>
                    <option value="Elétrico">Elétrico</option>
                    <option value="Gelo">Gelo</option>
                    <option value="Lutador">Lutador</option>
                    <option value="Venenoso">Venenoso</option>
                    <option value="Terrestre">Terrestre</option>
                    <option value="Voador">Voador</option>
                    <option value="Psíquico">Psíquico</option>
                    <option value="Inseto">Inseto</option>
                    <option value="Pedra">Pedra</option>
                    <option value="Fantasma">Fantasma</option>
                    <option value="Dragão">Dragão</option>
                    <option value="Sombrio">Sombrio</option>
                    <option value="Aço">Aço</option>
                    <option value="Fada">Fada</option>
                </select>

                <label for="localizacao">Localização:</label>
                <input class="input-form" type="text" id="localizacao" name="localizacao" required>

                <label for="data_registro">Data do Registro:</label>
                <input class="input-form" type="date" id="data_registro" name="data_registro" required>

                <label for="vida">Vida:</label>
                <input class="input-form" type="number" id="vida" name="vida" required>

                <label for="ataque">Ataque:</label>
                <input class="input-form" type="number" id="ataque" name="ataque" required>

                <label for="defesa">Defesa:</label>
                <input class="input-form" type="number" id="defesa" name="defesa" required>

                <label for="observacoes">Observações:</label>
                <textarea id="observacoes" name="observacoes"></textarea>

                <label for="imagme">Adicionar imagem:</label>
                <input type="file" id="imagem" name="imagem" accept=".jpg,.png ">

                <button id="button_cadastrar" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
<script src="js/main.js" defer></script>
</html>