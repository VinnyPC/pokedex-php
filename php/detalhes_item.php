<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/detalhes_item.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Detalhes do Item Pokémon</title>
</head>
<body>
    <div class="topo">
      <h1 class="pag-titulo">Detalhes do Item Pokémon</h1>
      <a class="btn-off" href="../index.php"><span class="material-symbols-outlined">
      power_settings_new
      </span></a>
    </div>
    <div class="item-container">
      <?php
      if (isset($_GET['url'])) {
          $item_url = $_GET['url'];
          $item_json = file_get_contents($item_url);
          $item_data = json_decode($item_json, true);

          
          if (isset($item_data['name'])) {
              echo "<h2>{$item_data['name']}</h2>";
              echo "<img src='{$item_data['sprites']['default']}' alt='Front Sprite'>";
              echo "<p><strong>Efeito:</strong> {$item_data['effect_entries'][0]['effect']}</p>";
          } else {
              echo "<p>Não foi possível carregar os detalhes do item.</p>";
          }
      } else {
          echo "<p>Nenhum item selecionado.</p>";
      }
      ?>
    </div>
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
