<?php

    include_once "conecta.php";

    $resultado = $conexao->prepare("UPDATE produtos SET nome= :n
                                    WHERE id=:id");

    //INICIO PREPARE
    $nome = "Caneta BIC";
    $id = 1;

    $resultados->bindValue(":id", $id);
    $resultado->bindValue(":n", $nome);
    $resultado->execute();
    //FIM PREPARE

    $conexao->query("UPDATE produtos SET preco = '2.50' WHERE id = '1' ");

?>