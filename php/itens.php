<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/itens.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <title>Itens Pokémon</title>
</head>
<body>
    <header>
        <a href="../../index.php">Home</a>
        <a href="../../php/listar_pokemons.php">Listar Pokemons</a>
        <a href="../../php/comparar_pokemon.php">Comparar Pokemons</a>
        <a href="../../php/detalhes_pokemon.php">Detalhes de Pokemon</a>
        <a href="../../php/itens.php">Itens</a>
    </header>
    <h1>Itens Pokémon</h1>
    <ul>
        <?php
        // Fazer a requisição para a API dos itens
        $url = 'https://pokeapi.co/api/v2/item/';
        $itens_json = file_get_contents($url);
        $itens_data = json_decode($itens_json, true);

        // Verificar se a requisição foi bem-sucedida e listar os itens
        if (isset($itens_data['results'])) {
            foreach ($itens_data['results'] as $item) {
                echo "<li><a href='detalhes_item.php?url={$item['url']}'>{$item['name']}</a></li>";
            }
        } else {
            echo "<li>Nenhum item encontrado.</li>";
        }
        ?>
    </ul>
</body>
</html>
