<?php

//cabeçalho
header("Content-Type: application/json"); //tipo de resposta json
$metodo = $_SERVER["REQUEST_METHOD"]; 

//conteudo
 $usuarios = [
    ["id" => 1, "nome" => "Carol", "email" => "carol@gamil.com"],
    ["id" => 2, "nome" => "Isa", "email" => "isa@gmail.com"]
];


switch ($metodo) {
    case 'GET':
        //echo "AQUI É O MÉTODO GET";
        echo json_encode($usuarios); //converte para json e retorna
        break;

    case 'POST':
        //echo "AQUI É O MÉTODO POST";
        $dados = json_decode(file_get_contents("php://input"), true); //pega os dados enviados
        //print_r($dados);
        $novousuario =[
            "id" => $dados["id"],
            "nome" => $dados["nome"],
            "email" => $dados["email"]
        ];

        //ADICIONA AO ARRAY
        array_push($usuarios, $novousuario);
        echo json_encode("Usuário adicionado com sucesso!");
        print_r($usuarios);
        break;
        
    default:
        echo "MÉTODO NÃO ENCONTRADO";
        break;
}




//resposta
//echo json_encode($usuarios); 


?>