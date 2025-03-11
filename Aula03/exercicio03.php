<?php
 //Crie uma função que receba um número 
 // e informe se ele é par ou ímpar.

 function parouimpar($num){
    if ($num % 2 == 0){
      return "O número $num é par";
    }
    else "O número $num ímpar";
 }

 $result = parouimpar(1890732);

 echo $result;

?>