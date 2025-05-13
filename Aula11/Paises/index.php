<?php
    $url = "https://restcountries.com/v3.1/all";
    $response = file_get_contents($url);
    $paises = json_decode($response , true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Países API </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Países</h1>

    <form method = "GET" class="form-busca">
        <input type="text" name = "busca" placeholder = "Digite um país" value = "<?php echo htmlspecialchars ($busca); ?>">
        <button type="submit">Buscar </button>
    </form>

    <div class= "container">
        <?php if (empty($paises)):?>
            <p>Nenhum país encontrado</p>
        <?php else: ?>
            <?php foreach ($paises as $pais): ?>
                <div class ="card">
                    <h3><?php echo $pais['name']['common'];?></h3>
                    <img src="<?php echo $pais['flags']['svg'];?>" alt="Bandeira <?php echo $pais['name']['common'];?>">
                    <p><strong>População:</strong> <?php echo number_format($pais ['population'], 0, ",", ".")?></p>
                    <p><strong>Continente:</strong> <?php echo $pais ['continents'][0];?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>