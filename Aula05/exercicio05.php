<?php
//Usando produtos.json, faça um script que:
//a) Leia os produtos do JSON.
//b) Remova um produto específico (exemplo: pelo nome).
//c) Salve o novo JSON atualizado no arquivo.

$content = file_get_contents("produtos.json");
$produtos = json_decode($content, true);

$remover = "Mouse";

//tirar duvida $key e $produto
foreach ($produtos as $key => $produto) {
    if ($produto['produto'] === $remover) {
        unset($produtos[$key]);
        break;}
}

print_r($produtos);
?>