<?php
// Inicializa as variáveis para armazenar os dados dos dois Pokémon
$pokemon1_data = null;
$pokemon2_data = null;

// Verifica se os nomes dos Pokémon foram enviados via GET
if(isset($_GET['name1']) && isset($_GET['name2'])) {
    $pokemon1_name = $_GET['name1'];
    $pokemon2_name = $_GET['name2'];
    
    // URL da API da PokéAPI com os nomes dos Pokémon
    $url1 = 'https://pokeapi.co/api/v2/pokemon/' . $pokemon1_name;
    $url2 = 'https://pokeapi.co/api/v2/pokemon/' . $pokemon2_name;
    
    // Obtém os dados dos dois Pokémon da API
    $pokemon1_json = file_get_contents($url1);
    $pokemon2_json = file_get_contents($url2);
    
    // Decodifica o JSON para arrays associativos
    $pokemon1_data = json_decode($pokemon1_json, true);
    $pokemon2_data = json_decode($pokemon2_json, true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comparar Pokémon</title>
    <link rel="stylesheet" type="text/css" href="../css/comparar_pokemon.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="topo">
      <h1 class="pag-titulo">Comparar Pokémon</h1>
      <a class="btn-off" href="../index.php"><span class="material-symbols-outlined">
      power_settings_new
      </span></a>
    </div>
    <form action="comparar_pokemon.php" method="GET">
        <input type="text" id="pokemon_name1" name="name1">
        <label for="versus">X</label>
        <input type="text" id="pokemon_name2" name="name2">
        <button type="submit">Comparar</button>
    </form>

    <?php if($pokemon1_data && $pokemon2_data): ?>
        <div class="pokemon-container">
          <div class="pokemon-details">
            <div class="pokemon-details-stats">
                <h2 class="pokemon-name"><?php echo $pokemon1_data['name']; ?></h2>
                <p>ID: <?php echo $pokemon1_data['id']; ?></p>
                <p>Base Experience: <?php echo $pokemon1_data['base_experience']; ?></p>
                <p>Height: <?php echo $pokemon1_data['height']; ?></p>
                <p>Weight: <?php echo $pokemon1_data['weight']; ?></p>
            </div>
            <div class="pokemon-details-sprites">
                <img src="<?php echo $pokemon1_data['sprites']['front_default']; ?>" alt="Front Sprite">
                <img src="<?php echo $pokemon1_data['sprites']['back_default']; ?>" alt="Back Sprite">
            </div>
            <div class="pokemon-details-ab">
                <p>Abilities:</p>
                <ul>
                    <?php foreach ($pokemon1_data['abilities'] as $ability): ?>
                        <li><?php echo $ability['ability']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="pokemon-details-type">
                <p>Type(s):</p>
                <ul>
                    <?php foreach ($pokemon1_data['types'] as $type): ?>
                        <li><?php echo $type['type']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>    
            </div>
              
            
            <div class="pokemon-details">
              <div class="pokemon-details-stats">
                <h2 class="pokemon-name"><?php echo $pokemon2_data['name']; ?></h2>
                <p>ID: <?php echo $pokemon2_data['id']; ?></p>
                <p>Base Experience: <?php echo $pokemon2_data['base_experience']; ?></p>
                <p>Height: <?php echo $pokemon2_data['height']; ?></p>
                <p>Weight: <?php echo $pokemon2_data['weight']; ?></p>
              </div>
              <div class="pokemon-details-sprites">
                <img src="<?php echo $pokemon2_data['sprites']['front_default']; ?>" alt="Front Sprite">
                <img src="<?php echo $pokemon2_data['sprites']['back_default']; ?>" alt="Back Sprite">
              </div>
              <div class="pokemon-details-ab">
                <p>Abilities:</p>
                <ul>
                    <?php foreach ($pokemon2_data['abilities'] as $ability): ?>
                        <li><?php echo $ability['ability']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
              </div>
              <div class="pokemon-details-type">
                <p>Type(s):</p>
                <ul>
                    <?php foreach ($pokemon2_data['types'] as $type): ?>
                        <li><?php echo $type['type']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
              </div>
              </div>
              
          </div>
        </div>
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
