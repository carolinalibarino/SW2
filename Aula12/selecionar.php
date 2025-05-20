<?php

    include_once 'conecta.php';

    $resultado = $conexao->prepare("SELECT * FROM produtos WHERE id = :id ");

    $id = 1;

    $resultado->bindValue(":id", $id);
    $resultado-> execute();
    //$final = $resultado->fetch();
    //$final = $resultado->fetch(PDO::FETCH_ASSOC);
    $final = $resultado->fetchAll(PDO::FETCH_ASSOC);



    //visualização 01
    //var_dump($final);

    //visualização 02
    //echo "<pre>";
    //print_r($final);
    //echo "<pre>";


    //FETCH
    //foreach ($final as $key => $value) {
        //echo $key . "=" . $value . "<br>";
    //}


    //FETCHALL
    foreach ($final as $produto){
        echo "ID:" . $produto['id']. "<br>";
        echo "Nome:" . $produto['nome']. "<br>";
        echo "Preço: R$" . $produto['preco']. "<br><hr>";

    }
?>