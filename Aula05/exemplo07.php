<?php

//CRIA A  STRING
//STRING MAL FORMADA POIS O SEXO ESTÁ SEM ASPAS
$json_str = '{"nome":"Carol","idade":17,"sexo": F}';


//GERA O OBEJTO 
$obj = json_decode($json_str);

//VERIFICA SE HOUVE ERRO NO PARSING
if (json_last_error()== 0){
    echo '- Não houve erro, o parsing foi perfeito';
}
else{
    echo '- Houve erro no parsing';
    switch (json_last_error()){
        case JSON_ERROR_DEPTH:
            echo ' Profundidade máxima excedida';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' JSON malformado ou inválido';
            break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' Erro de caractere de controle';
            break;
        case JSON_ERROR_SYNTAX:
            echo ' Erro de sintaxe';
            break;
        case JSON_ERROR_UTF8:
            echo 'Caractere UTF-8 malformado';
            break;
        default:
            echo 'Erro desconhecido';
            break;
    }
}
?>