<?php

//CRIA ARRAY ASSOCIATIVO
$idades = array("Carol" =>17, "Isa"=>17, "Lele"=> 17);

//CONVERTE O ARRAY EM STRING JSON
$json_str = json_encode($idades);

//EXIBE A STRING JSON
echo $json_str;
?>