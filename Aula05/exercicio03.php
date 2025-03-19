<?php
//Usando o arquivo produtos.json do exercício 1, faça um script que:
//a) Leia o JSON do arquivo e o converta para um array.
//b) Adicione um novo produto ao array.
//c) Converta o array atualizado para JSON e salve de volta no arquivo.


$content = file_get_contents("usuarios.json");
$users = json_decode($content, true);


$users = array_merge($users, array(
    array(
        "id" => 4,
        "nome" => "João",
        "email" => "joao@gmail.com"

    )));

    $json = json_encode($users);
    file_put_contents("usuarios.json", $json);
    print_r($users);
?>