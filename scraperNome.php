<?php 
$username = $_GET['username'];
header("Access-Control-Allow-Origin: *");
$url = 'https://steamcommunity.com/id/'.$username.'/games/?tab=all';
$html = file_get_contents($url);
//echo $html;
$arr = explode('<title>Steam Community :: ', $html);
$parte1 = $arr[1];
$parte2 = explode('::', $parte1)[0];
if (strlen($parte2) > 30) {
    $parte2 = "<span style='color:red'>Ocorreu um erro, por favor me relate</span>";
}
echo $parte2;

?>