<?php

//Criar um JSON a partir de um array e salvar em um arquivo
//Crie um array com informações de 3 produtos (nome, preço e quantidade). Converta o array para
//JSON e salve no arquivo produtos.json.

$content = file_get_contents("produtos.json");
$dados = json_decode($content, true);
print_r($dados);
?>