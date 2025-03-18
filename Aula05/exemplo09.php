<?php

$json = '{
    "nome": "Carol",
    "idade": 17,
    "email": "carol@gmail.com" }';

    $dados = json_decode($json, true);
    print_r($dados);
?>