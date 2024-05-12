<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/detalhes_item.css">
    <title>Detalhes do Item Pokémon</title>
</head>
<body>
    <nav>
        <a href="../../index.php">Home</a>
        <a href="../../php/listar_pokemons.php">Listar Pokemons</a>
        <a href="../../php/comparar_pokemon.php">Comparar Pokemons</a>
        <a href="../../php/detalhes_pokemon.php">Detalhes de Pokemon</a>
        <a href="../../php/itens.php">Itens</a>
    </nav>
    <h1>Detalhes do Item Pokémon</h1>
    <?php
    if (isset($_GET['url'])) {
        $item_url = $_GET['url'];
        $item_json = file_get_contents($item_url);
        $item_data = json_decode($item_json, true);

        // Verificar se a requisição foi bem-sucedida e exibir os detalhes do item
        if (isset($item_data['name'])) {
            echo "<p><strong>Nome:</strong> {$item_data['name']}</p>";
            echo "<p><strong>Efeito:</strong> {$item_data['effect_entries'][0]['effect']}</p>";
            // Exibir outras informações do item conforme necessário
        } else {
            echo "<p>Não foi possível carregar os detalhes do item.</p>";
        }
    } else {
        echo "<p>Nenhum item selecionado.</p>";
    }
    ?>
</body>
</html>
