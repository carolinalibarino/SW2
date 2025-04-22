<?php

//cabeçalho
header("Content-Type: application/json; charset=UTF-8"); //tipo de resposta json
$metodo = $_SERVER["REQUEST_METHOD"]; 


$arquivo = 'usuarios.json'; //caminho do arquivo json

if (!file_exists($arquivo)){
    file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
     //cria o arquivo se não existir
}

$usuarios = json_decode(file_get_contents($arquivo), true); //pega o conteudo do arquivo e transforma em array associativo

//conteudo
/*  $usuarios = [
    ["id" => 1, "nome" => "Carol", "email" => "carol@gamil.com"],
    ["id" => 2, "nome" => "Isa", "email" => "isa@gmail.com"]
]; */


switch ($metodo) {
    case 'GET':
        //echo "AQUI É O MÉTODO GET";
/*         echo json_encode($usuarios); //converte para json e retorna
        break; */
        if (isset($_GET['id'])){
            //se o id for passado, procura o usuario
            $id = intval($_GET['id']);
           $usuario_encontrado =  null;

            //procura o usuario no array
            foreach ($usuarios as $usuario) {
                if ($usuario['id'] == $id) {
                    $usuario_encontrado = $usuario;
                    break;
                }
            }
            if ($usuario_encontrado) {
                echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404); //código de erro 404
                echo json_encode(["erro" => "USUÁRIO NÃO ENCONTRADO"], JSON_UNESCAPED_UNICODE);
            }
        }else{
            //se o id não for passado, retorna todos os usuarios
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); //converte para json e retorna
        }
        break;

    case 'POST':
        //echo "AQUI É O MÉTODO POST";
        $dados = json_decode(file_get_contents('php://input'), true); //pega os dados enviados
        
        
        if (!isset($dados["nome"]) || !isset($dados["email"])){
            http_response_code(400); //código de erro 400
            echo json_encode(["erro" => "DADOS IMCOMPLETOS"], JSON_UNESCAPED_UNICODE);
            exit;
        }
        
        $novo_id = 1;
        if (!empty($usuarios)) {
           $ids = array_column($usuarios, 'id'); //pega os ids dos usuarios
           $novo_id = max($ids) + 1; //pega o maior id e soma 1
        }
        //print_r($dados);
        $novo_usuario =[
            "id" => $novo_id,
            "nome" => $dados["nome"],
            "email" => $dados["email"]
        ];

        //adiciona ao array de usuarios
        $usuarios[] = $novousuario; 

        //salva ao array e atualiza o arquivo json
        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); 

        //retorna mensagem
        echo json_encode([
            "mensagem" => "Usuário adicionado com sucesso!", 
            "usuarios" => $usuarios], JSON_UNESCAPED_UNICODE);

        /* //ADICIONA AO ARRAY
        array_push($usuarios, $novousuario);
        echo json_encode("Usuário adicionado com sucesso!");
        print_r($usuarios); */
        break;
        
    default:
        //echo "MÉTODO NÃO ENCONTRADO";
        http_response_code(405); //código de erro 405
        echo json_encode(["erro" => "MÉTODO NÃO PERMITIDO"], JSON_UNESCAPED_UNICODE);
        break;
}




//resposta
//echo json_encode($usuarios); 


?>