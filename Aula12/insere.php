<?php
    include_once 'conecta.php';

    $resultado = $conexao ->prepare("INSERT INTO produtos (nome,preco,estoque
                                    VALUES (:n, :p, :e)");

//INÍCIO PREPARE
    //prepare
    //$nome = "Caneta";
    //$preco = 1.52;
    //$estoque = 100;

    //$resultado->bindParam(":variaveldocodigo", $variaveldobanco);
    //$resultado->bindParam(":variaveldocodigo", "valorfixo";

    //$resultado->bindParam(":n", $nome);
    //$resultado->bindParam(":p", $preco);
    //$resultado->bindParam(":e", $estoque);

    //$resultado-> excute();

//FIM PREPARE

//INÍCIO QUERY

    $conexao ->query("INSERT INTO produtos (nome,preco,estoque)
                    VALUES ('Agenda, '25.50', '5')");

    //a query não precisa de $resultado-> excute();
//FIM QUERY
?>