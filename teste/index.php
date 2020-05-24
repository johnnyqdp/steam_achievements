<?php 

$id = '21690';
$url = "https://steamcommunity.com/id/coffeepills/stats/" . $id . "/?tab=achievements";

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
echo $todosJogos;



//echo ($html);
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
$a = "a";
//echo htmlentities($html);
//echo $html
?>