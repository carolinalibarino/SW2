<?php
$cep = isset($_GET['cep']) ? trim($_GET['cep']) : '';
$erro = '';
$dado = null;
$regiao = '';

if ($cep !== '') {
    if (!preg_match('/^\d{8}$/', $cep)) {
        $erro = "CEP inválido. Digite exatamente 8 números.";
    } else {
        $url = "https://viacep.com.br/ws/$cep/json/";
        $response = file_get_contents($url);
        $dado = json_decode($response, true);

        if (isset($dado['erro'])) {
            $erro = "CEP não encontrado.";
        } else {
            // Determinar a região com base na UF
            $regioes = [
                'Norte' => ['AC', 'AP', 'AM', 'PA', 'RO', 'RR', 'TO'],
                'Nordeste' => ['AL', 'BA', 'CE', 'MA', 'PB', 'PE', 'PI', 'RN', 'SE'],
                'Centro-Oeste' => ['DF', 'GO', 'MT', 'MS'],
                'Sudeste' => ['ES', 'MG', 'RJ', 'SP'],
                'Sul' => ['PR', 'RS', 'SC']
            ];

            foreach ($regioes as $nome => $ufs) {
                if (in_array($dado['uf'], $ufs)) {
                    $regiao = $nome;
                    break;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Buscar CEP - ViaCEP API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Consulta de Endereço por CEP</h1>

    <form method="GET" class="form-busca">
        <input type="text" name="cep" placeholder="Digite o CEP (somente números)" value="<?php echo htmlspecialchars($cep); ?>">
        <button type="submit">Buscar</button>
    </form>

    <div class="container">
        <?php if ($erro): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php elseif ($dado): ?>
            <div class="card">
                <p><strong>Logradouro:</strong> <?php echo $dado['logradouro'] ?: 'N/A'; ?></p>
                <p><strong>Bairro:</strong> <?php echo $dado['bairro'] ?: 'N/A'; ?></p>
                <p><strong>Localidade:</strong> <?php echo $dado['localidade']; ?></p>
                <p><strong>UF:</strong> <?php echo $dado['uf']; ?></p>
                <p><strong>Estado:</strong> <?php echo $dado['uf']; ?></p>
                <p><strong>Região:</strong> <?php echo $regiao; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
