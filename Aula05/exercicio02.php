<?php
// Ler um arquivo JSON e exibir os dados na tela
//Crie um arquivo usuarios.json contendo uma lista de usuários com os atributos id, nome e email.
//Depois, faça um script PHP que:
//a) Leia o arquivo JSON usando file_get_contents().
//b) Converta o JSON em um array PHP com json_decode().
//c) Exiba os nomes e emails de todos os usuários.

$content = file_get_contents("usuarios.json");
$users = json_decode($content, true);


if (is_array($users)) {
    foreach ($users as $user) {
        echo "Nome: " . $user['nome'] . "<br>";
        echo "Email: " . $user['email'] . "<br><br>";
    }
} else {
    echo "Erro ao ler o arquivo JSON.";
}


?>