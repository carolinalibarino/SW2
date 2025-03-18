<?php

//CRIA A STRING JSON
$json_str = '{"Carol" :17, "Isa": 17, "Lele": 17}';

//TRANSFORMA A STRING EM ARRAY ASSOCIATIVO
$json_arr = json_decode($json_str, true);

//EXIBE O ARRAY
var_dump($json_arr);
?>