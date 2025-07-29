<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Pokémons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Ícone da lupa (Google Fonts Material Icons) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bitcount:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">
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
        <div class="alinhamento-search">
            <div class="search-container">
                <input type="text" id="search" placeholder="Digite o nome de um Pokémon" autocomplete="off">
                <div id="suggestions"></div>
            </div>
        </div>

        <div class="card-list">
            <!-- Aqui será carregado o conteúdo filtrado pelo JavaScript -->
        </div>

    </div>
    <div id="modal-editar" class="modal hidden">
        <div class="modal-content">
            <h2>Editar Pokémon</h2>
            <form id="form-editar">
                <input type="hidden" name="id" id="edit-id">
                <label>Nome: <input type="text" name="nome" id="edit-nome"></label><br>
                <label>Tipo: <input type="text" name="tipo" id="edit-tipo"></label><br>
                <label>HP: <input type="number" name="vida" id="edit-vida"></label><br>
                <label>Ataque: <input type="number" name="ataque" id="edit-ataque"></label><br>
                <label>Defesa: <input type="number" name="defesa" id="edit-defesa"></label><br>
                <button type="submit">Salvar</button>
                <button type="button" id="cancelar">Cancelar</button>
            </form>
        </div>
    </div>

</body>
<script src="js/main.js" defer></script>

</html>