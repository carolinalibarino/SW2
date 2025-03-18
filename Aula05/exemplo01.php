<?php

//STRING JSON COM OS DADOS
$json_str = '{"nome":"João","idade":20,"sexo":"M"}';

//GERA O OBJETO JSON
$json_obj = json_decode($json_str);

//EXIBE OS DADOS DO OBJETO JSON
echo "Nome: " . $json_obj->nome . "<br>";
echo "Idade: " . $json_obj->idade . "<br>";
echo "Sexo: " . $json_obj->sexo . "<br>";
?>