<?php

//CRIA UM ARRAY COM 3 EMPREGADOS
$empregados = array ('empregados' => array(
    array(
        'nome' => 'Ana Maria',
        'idade' => 23,
        'sexo' => 'F',   
    ),
    array(
        'nome' => 'Pedro Silva',
        'idade' => 35,
        'sexo' => 'M',   
    ),
    array(
        'nome' => 'José Souza',
        'idade' => 59,
        'sexo' => 'M',   
    )));


    //CONVERTE O ARRAY EM STRING JSON
    $json_str = json_encode($empregados);

    //EXIBE A STRING JSON
    echo "$json_str";
?>