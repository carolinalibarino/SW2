<?php

$busca = isset($_GET['busca']) ? strtolower(trim($_GET['busca'])): '';

$url = "https://restcountries.com/v3.1/all";
$response = file_get_contents($url);
$paises = json_decode($response , true);

if ($busca !== ''){
    $paises = array_filter($paises, function ($pais) use ($busca){
        return strpos (strtolower($pais['name']['common']), $busca)  !== false;
    });
}
?>

