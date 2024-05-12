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
    <style>
        .pokemon-container {
            display: flex;
            justify-content: space-between;
        }
        .pokemon-details {
            border: 1px solid #ccc;
            padding: 10px;
            width: 45%;
        }
        .pokemon-details img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1>Comparar Pokémon</h1>
    
    <!-- Formulário para inserir os nomes dos Pokémon -->
    <form action="comparar_pokemon.php" method="GET">
        <label for="pokemon_name1">Nome do 1º Pokémon:</label>
        <input type="text" id="pokemon_name1" name="name1">
        <label for="pokemon_name2">Nome do 2º Pokémon:</label>
        <input type="text" id="pokemon_name2" name="name2">
        <button type="submit">Comparar</button>
    </form>

    <!-- Verifica se os dados dos Pokémon foram obtidos -->
    <?php if($pokemon1_data && $pokemon2_data): ?>
        <div class="pokemon-container">
            <div class="pokemon-details">
                <h2><?php echo $pokemon1_data['name']; ?></h2>
                <p><strong>ID:</strong> <?php echo $pokemon1_data['id']; ?></p>
                <p><strong>Base Experience:</strong> <?php echo $pokemon1_data['base_experience']; ?></p>
                <p><strong>Height:</strong> <?php echo $pokemon1_data['height']; ?></p>
                <p><strong>Weight:</strong> <?php echo $pokemon1_data['weight']; ?></p>
                <p><strong>Abilities:</strong></p>
                <ul>
                    <?php foreach ($pokemon1_data['abilities'] as $ability): ?>
                        <li><?php echo $ability['ability']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Type(s):</strong></p>
                <ul>
                    <?php foreach ($pokemon1_data['types'] as $type): ?>
                        <li><?php echo $type['type']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Sprites:</strong></p>
                <img src="<?php echo $pokemon1_data['sprites']['front_default']; ?>" alt="Front Sprite">
                <img src="<?php echo $pokemon1_data['sprites']['back_default']; ?>" alt="Back Sprite">
            </div>
            <div class="pokemon-details">
                <h2><?php echo $pokemon2_data['name']; ?></h2>
                <p><strong>ID:</strong> <?php echo $pokemon2_data['id']; ?></p>
                <p><strong>Base Experience:</strong> <?php echo $pokemon2_data['base_experience']; ?></p>
                <p><strong>Height:</strong> <?php echo $pokemon2_data['height']; ?></p>
                <p><strong>Weight:</strong> <?php echo $pokemon2_data['weight']; ?></p>
                <p><strong>Abilities:</strong></p>
                <ul>
                    <?php foreach ($pokemon2_data['abilities'] as $ability): ?>
                        <li><?php echo $ability['ability']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Type(s):</strong></p>
                <ul>
                    <?php foreach ($pokemon2_data['types'] as $type): ?>
                        <li><?php echo $type['type']['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Sprites:</strong></p>
                <img src="<?php echo $pokemon2_data['sprites']['front_default']; ?>" alt="Front Sprite">
                <img src="<?php echo $pokemon2_data['sprites']['back_default']; ?>" alt="Back Sprite">
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
