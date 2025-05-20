<?php
    $host = 'localhost';
    $banco = 'loja';
    $usuario = 'root';
    $senha = '';


    try {
        $conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    } catch (PDOException $e) {
        echo "Erro de Banco de Dados: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro genérico: ". $e->getMessage();
    }

?>