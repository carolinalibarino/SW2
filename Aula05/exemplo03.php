<?php

//EMPREGADO COM DEPENDENTES
$json_str = '{"empregados": '.
'[
    {"nome":"Ana Maria","idade":23,"sexo":"F", "dependentes" : ["Ravi", "Mavie"]},'.
    '{"nome":"Pedro Silva","idade":35,"sexo":"M"},'.
    '{"nome":"José Souza","idade":59,"sexo":"M"}'.
'],"data" : "18/03/2025"}';

//CRIA ARRAY EMPREGADOS 
$json_obj = json_decode($json_str);
$empregados = $json_obj->empregados;

//IMPRIME A DATA E EMPREGADOS E DEPENDENTES CASO HOUVER 
echo "<br>data do aquivo: " . $json_obj->data . "<br>";
foreach ($empregados as $e){
    echo " <br>nome: " . $e->nome . "<br>";
    echo "idade: " . $e->idade . "<br>";
    echo "sexo: " . $e->sexo . "<br><br>";
    if (property_exists($e, "dependentes")){
        $deps = $e->dependentes;
        echo "Dependentes: <br>";
        foreach ($e->dependentes as $d){
            echo $d . "<br>";
        }
    }
}
?>