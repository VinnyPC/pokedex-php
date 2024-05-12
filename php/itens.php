<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/itens.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <title>Itens Pokémon</title>
</head>
<body>
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
