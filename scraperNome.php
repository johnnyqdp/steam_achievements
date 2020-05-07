<?php 
$username = $_GET['username'];
header("Access-Control-Allow-Origin: *");
$url = 'https://steamcommunity.com/id/'.$username.'/games/?tab=all';
$html = file_get_contents($url);
$arr = explode('<title>Steam Community :: ', $html);
$parte1 = $arr[1];
$parte2 = explode('::', $parte1)[0];
echo $parte2;

?>