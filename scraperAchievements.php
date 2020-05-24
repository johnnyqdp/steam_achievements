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

if ((empty($porcentagem) && $porcentagem != "0") || (empty($conquistasPegas) && $conquistasPegas != "0") || (empty($conquistasTotais)) && $conquistasTotais != "0") {
    $arr = explode('<div class="achievementStatusLeft">Personal Achievements Earned:</div>', $html);
    $parte1 = $arr[1];
    $parte2 = explode(' of ', $parte1);

    $conquistasPegas = $parte2[0];

    $parte3 = explode(' (', $parte2[1]);

    $conquistasTotais = $parte3[0];

    $parte4 = explode('%', $parte3[1]);

    $porcentagem = $parte4[0];
}

$conquistasPegas = ltrim($conquistasPegas);

$color = "#99b3e6";
if ($porcentagem == "100") {
    $color = "#8cd98c";
} else if ($porcentagem < 7) {
    $color = "#ff6666";
}

$styleFontSize = "";
$classTopSummary = "topSummaryAchievements";
if ($_GET['isMobile'] == "true") {
    $classTopSummary .= 'mobile';
    $styleFontSize = "font-size:12px";
}

$retorno = '<div class="'.$classTopSummary.'" id="topSummaryAchievements" style="margin-right:10px">
                <div style="color:'.$color.';'.$styleFontSize.'"> '.$conquistasPegas.' de '.$conquistasTotais.' ('.$porcentagem.'%) conquistas alcançadas </div>
                <div class="achieveBar">
                    <div class="achieveBarProgress" style="width: '.$porcentagem.'%; background-color: '.$color.';">
                </div>
            </div>';


if ((empty($porcentagem) && $porcentagem != "0") || (empty($conquistasPegas) && $conquistasPegas != "0") || (empty($conquistasTotais)) && $conquistasTotais != "0") {
    $retorno = '<span style="color:#99b3e6">Este jogo não possui conquistas.</span>';
}

if (strlen($porcentagem) > 9 || strlen($conquistasPegas) > 9 || strlen($conquistasTotais) > 9 || $conquistasTotais == "0") {
    $retorno = '<span style="color:#99b3e6">Este jogo não possui conquistas.</span>';
}



/**PEGANDO DETALHAMENTO */
$options = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"Accept-language: pt-br\r\n" .
                "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
    )
  );
  
$context = stream_context_create($options);

$html = file_get_contents($url, false, $context);

$arr = explode('<div id="personalAchieve" class="achievements_list ">', $html);
$parte1 = $arr[1];
$parte2 = explode('<div id="footer_spacer"></div>', $parte1)[0];

$todosJogos = $parte2;


/** ****************** */


$array = array(
    'achievements' => $retorno,
    'detalhamento' => $todosJogos
);

echo json_encode($array);


?>