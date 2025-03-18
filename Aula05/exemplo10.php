<?php

$content = file_get_contents("dados.json");
$dados = json_decode($content, true);
print_r($dados);
?>