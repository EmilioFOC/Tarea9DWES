<?php
/**
 * Realiza una petición a la API de Pokémon para obtener información detallada sobre un Pokémon aleatorio.
 *
 * @return object Retorna un objeto que contiene la información del Pokémon aleatorio.
 */
function obtenerPokemonAleatorio() {
    // Se realiza la petición a la API que nos devuelve información sobre un Pokémon aleatorio
    $pokemon_json = file_get_contents('https://pokeapi.co/api/v2/pokemon/');
    // Se decodifica el fichero JSON y se convierte a objeto
    $pokemon_data = json_decode($pokemon_json);
    // Se obtiene un Pokémon aleatorio de la lista de resultados
    $random_pokemon = $pokemon_data->results[array_rand($pokemon_data->results)];

    // Realiza una petición para obtener información detallada sobre el Pokémon
    $pokemon_info_json = file_get_contents($random_pokemon->url);
    // Decodifica el JSON y lo convierte en objeto
    $pokemon_info = json_decode($pokemon_info_json);

    return $pokemon_info;
}

// Se obtiene un Pokémon aleatorio
$random_pokemon = obtenerPokemonAleatorio();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Aleatorio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1, h2, p {
            color: #333;
        }

        img {
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }

        .abilities, .types {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Pokémon Aleatorio</h1>
    
    <h2><?php echo ucfirst($random_pokemon->name); ?></h2>

    <?php
    // Mostrar imagen del Pokémon
    echo "<img src='" . $random_pokemon->sprites->front_default . "' alt='" . ucfirst($random_pokemon->name) . "'>";

    // Mostrar habilidades del Pokémon
    echo "<div class='abilities'>";
    echo "<h3>Habilidades:</h3>";
    foreach ($random_pokemon->abilities as $ability) {
        echo "<p>" . ucfirst($ability->ability->name) . "</p>";
    }
    echo "</div>";

    // Mostrar tipos del Pokémon
    echo "<div class='types'>";
    echo "<h3>Tipos:</h3>";
    foreach ($random_pokemon->types as $type) {
        echo "<p>" . ucfirst($type->type->name) . "</p>";
    }
    echo "</div>";
    ?>

    <script>
        // Refrescar la página cada 10 segundos
        setInterval(function(){
            location.reload();
        }, 10000);
    </script>
</body>
</html>

