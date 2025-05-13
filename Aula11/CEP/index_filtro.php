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
