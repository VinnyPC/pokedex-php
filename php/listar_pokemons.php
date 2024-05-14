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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Lista Pokémons</title>
</head>
<div class="topo">
      <a class="btn-off" href="../index.php"><span class="material-symbols-outlined">
      power_settings_new
      </span></a>
<body>
    <ul class="pokemon-list">
    <?php foreach ($pokemons as $pokemon): ?>
        <li class="pokemon-card">
            <div class="card">
                <img src="<?php echo getSprite($pokemon['url']); ?>" alt="<?php echo $pokemon['name']; ?>">
                <div class="card__content">
                    <p class="card__title"><?php echo $pokemon['name']; ?></p>
                    <p class="card__description"><img src="<?php echo getSprite($pokemon['url']); ?>" alt="<?php echo $pokemon['name']; ?>"></p>
                </div>
            </div>
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
