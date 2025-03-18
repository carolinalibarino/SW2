<?php

//STRING JSON COM ARRAY 
$json = '{"empregados":['.
    '{"nome":"Ana Maria","idade":23,"sexo":"F"},'.
    '{"nome":"Pedro Silva","idade":35,"sexo":"M"},'.
    '{"nome":"José Souza","idade":59,"sexo":"M"}
    ]}';

    //GERA O OBJETO CRIANDO O ARRAY
    $json_obj = json_decode($json);
    $empregados = $json_obj->empregados;

    //IMPRIME OS DADOS DO ARRAY
    foreach($empregados as $e){
        echo "Nome: " . $e->nome . "<br>";
        echo "Idade: " . $e->idade . "<br>";
        echo "Sexo: " . $e->sexo . "<br>";}
?>