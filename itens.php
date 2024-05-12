<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Pokémon</title>
    <style>
        /* Adicione estilos CSS aqui */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
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
</body>
</html>
