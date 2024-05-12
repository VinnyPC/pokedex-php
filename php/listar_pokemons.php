<?php
$json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=100&offset=0');
$data = json_decode($json, true);
$pokemons = $data['results'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/listar_pokemons.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <title>Listar Pokemons</title>
</head>
<body>
    <header>
        <a href="../../index.php">Home</a>
        <a href="../../php/listar_pokemons.php">Listar Pokemons</a>
        <a href="../../php/comparar_pokemon.php">Comparar Pokemons</a>
        <a href="../../php/detalhes_pokemon.php">Detalhes de Pokemon</a>
        <a href="../../php/itens.php">Itens</a>
    </header>
    <h1>Listar Pokemons</h1>
    <ul>
        <?php foreach ($pokemons as $pokemon): ?>
            <li>
                <strong>Name:</strong> <?php echo $pokemon['name']; ?><br>
                <img src="<?php echo getSprite($pokemon['url']); ?>" alt="">
            </li>
        <?php endforeach; ?>
    </ul>

    <?php

    function getSprite($url) {
        $pokemon_json = file_get_contents($url);
        $pokemon_data = json_decode($pokemon_json, true);
        return $pokemon_data['sprites']['front_default'];
    }
    ?>
</body>
</html>
