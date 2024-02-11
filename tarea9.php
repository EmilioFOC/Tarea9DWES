<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES: Tarea 9</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            font-style: italic;
            color: #666;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            //Cada 5 segundos (5000 milisegundos) se ejecutará la función refrescar
            setTimeout(refrescar, 5000);
        });

        function refrescar(){
            //Actualiza la página
            location.reload();
        }
    </script>
</head>
<body>
    <h1> Pokémon Aleatorio </h1>
    <?php
        // Se realiza la petición a la API que nos devuelve información sobre un Pokémon aleatorio
        $pokemon_json = file_get_contents('https://pokeapi.co/api/v2/pokemon/');
        // Se decodifica el fichero JSON y se convierte a objeto
        $pokemon_data = json_decode($pokemon_json);
        // Se obtiene un Pokémon aleatorio de la lista de resultados
        $random_pokemon = $pokemon_data->results[array_rand($pokemon_data->results)];
    ?>

    <h2><?php echo $random_pokemon->name; ?></h2>
</body>
</html>
