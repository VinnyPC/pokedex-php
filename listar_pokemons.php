<?php
$json = file_get_contents('https://pokeapi.co/api/v2/pokemon');
$data = json_decode($json, true);
$pokemons = $data['results'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Pokemons</title>
</head>
<body>
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
