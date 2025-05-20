<?php

    include_once 'conecta.php';

    //INICIO PREPARE
    $resultado = $conexao->prepare("DELETE FROM produtos
                                    WHERE id = :id ");

    $id = 2;

    $resulltado->bindValue(":id", $id);
    $resultado-> excute();
    //FIM PREPARE

    //QUERY
    $conexao-> query("DELETE FROM produtos WHERE id =3");


?>