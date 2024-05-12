<?php
$json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=100&offset=0');
$data = json_decode($json, true);
$pokemons = $data['results'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/listar_pokemons.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
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
    <nav class="nav">
  <input id="menu" type="checkbox">
  <label for="menu">Menu</label>
  <ul class="menu">
    <li>
      <a href="./comparar_pokemon.php">
        <span>Comparar</span>
        <i class="fa-regular fa-clipboard"></i>
      </a>
    </li>
    <li>
      <a href="./itens.php">
        <span>Itens</span>
        <i class="fa-solid fa-bullseye"></i>
      </a>
    </li>
    <li>
      <a href="./detalhes_pokemon.php">
        <span>Pokémon</span>
        <i class="fa-solid fa-magnifying-glass"></i>
      </a>
    </li>
    <li>
      <a href="./listar_pokemons.php">
        <span>Pokémons</span>
        <i class="fa-solid fa-list"></i>
      </a>
    </li>
  </ul>
</nav>
<script src="https://kit.fontawesome.com/70ebb0b9ef.js" crossorigin="anonymous"></script>
</body>
</html>
