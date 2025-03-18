<?php

$dados = [
    "nome" => "Carol",
    "idade" => 17,
    "email" => "carol@gmail.com"
];

$json = json_encode($dados, JSON_PRETTY_PRINT);
echo $json;
?>