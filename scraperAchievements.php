<?php 
$username = $_GET['username'];
$gameId = $_GET['gameId'];
header("Access-Control-Allow-Origin: *");

$url = 'https://steamcommunity.com/id/'.$username.'/stats/'.$gameId.'/?tab=achievements';
$html = file_get_contents($url);


$arr = explode('<meta name="Description" content="', $html);
$parte1 = $arr[1];
$parte2 = explode(' of ', $parte1);

$conquistasPegas = $parte2[0];

$parte3 = explode(' (', $parte2[1]);

$conquistasTotais = $parte3[0];

$parte4 = explode('%', $parte3[1]);

$porcentagem = $parte4[0];


if ((empty($porcentagem) && $porcentagem != "0") || (empty($conquistasPegas) && $conquistasPegas != "0") || (empty($conquistasTotais)) && $conquistasTotais != "0") {
    $arr = explode('<div id="topSummaryAchievements">', $html);
    $parte1 = $arr[1];
    $parte2 = explode(' of ', $parte1);

    $conquistasPegas = $parte2[0];

    $parte3 = explode(' (', $parte2[1]);

    $conquistasTotais = $parte3[0];

    $parte4 = explode('%', $parte3[1]);

    $porcentagem = $parte4[0];
}


$color = "blue";
if ($porcentagem == "100") {
    $color = "green";
} else if ($porcentagem < 7) {
    $color = "red";
}

$retorno = '<div class="topSummaryAchievements" id="topSummaryAchievements" style="margin-right:10px">
                <div style="color:'.$color.'"> '.$conquistasPegas.' de '.$conquistasTotais.' ('.$porcentagem.'%) conquistas alcançadas </div>
                <div class="achieveBar">
                    <div class="achieveBarProgress" style="width: '.$porcentagem.'%; background-color: '.$color.';">
                </div>
            </div>';


if ((empty($porcentagem) && $porcentagem != "0") || (empty($conquistasPegas) && $conquistasPegas != "0") || (empty($conquistasTotais)) && $conquistasTotais != "0") {
    $retorno = '<span style="color:blue">Este jogo não possui conquistas.</span>';
}

if (strlen($porcentagem) > 9 || strlen($conquistasPegas) > 9 || strlen($conquistasTotais) > 9) {
    $retorno = '<span style="color:blue">Este jogo não possui conquistas.</span>';
}

echo $retorno;


?>