<?php
// Inicializa a variável para armazenar os dados do Pokémon
$pokemon_data = null;

// Verifica se o nome do Pokémon foi enviado via GET
if(isset($_GET['name'])) {
    $pokemon_name = $_GET['name'];
    
    // URL da API da PokéAPI com o nome do Pokémon
    $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokemon_name;
    
    // Obtém os dados do Pokémon da API
    $pokemon_json = file_get_contents($url);
    
    // Decodifica o JSON para um array associativo
    $pokemon_data = json_decode($pokemon_json, true);
} else {
    // Se nenhum nome de Pokémon for fornecido na URL, $pokemon_data permanece como null
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <title>Detalhes do Pokémon</title>
    <link rel="stylesheet" type="text/css" href="../css/detalhes_pokemon.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Detalhes do Pokémon</h1>
    
    <!-- Formulário para inserir o nome do Pokémon -->
    <form action="detalhes_pokemon.php" method="GET">
        <label for="pokemon_name">Nome do Pokémon:</label>
        <input type="text" id="pokemon_name" name="name">
        <button type="submit">Buscar</button>
    </form>

    <!-- Verifica se os dados do Pokémon foram obtidos -->
    <?php if($pokemon_data): ?>
        <h2>Detalhes de <?php echo $pokemon_data['name']; ?></h2>
        <p><strong>ID:</strong> <?php echo $pokemon_data['id']; ?></p>
        <p><strong>Base Experience:</strong> <?php echo $pokemon_data['base_experience']; ?></p>
        <p><strong>Height:</strong> <?php echo $pokemon_data['height']; ?></p>
        <p><strong>Weight:</strong> <?php echo $pokemon_data['weight']; ?></p>
        <p><strong>Abilities:</strong></p>
        <ul>
            <?php foreach ($pokemon_data['abilities'] as $ability): ?>
                <li><?php echo $ability['ability']['name']; ?></li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Type(s):</strong></p>
        <ul>
            <?php foreach ($pokemon_data['types'] as $type): ?>
                <li><?php echo $type['type']['name']; ?></li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Sprites:</strong></p>
        <img src="<?php echo $pokemon_data['sprites']['front_default']; ?>" alt="Front Sprite">
        <img src="<?php echo $pokemon_data['sprites']['back_default']; ?>" alt="Back Sprite">
    <?php endif; ?>
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
