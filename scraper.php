<?php 
$username = $_GET['username'];
header("Access-Control-Allow-Origin: *");

$url = 'https://steamcommunity.com/id/'.$username.'/games/?tab=all';
//echo file_get_contents($url);
$html = file_get_contents($url);
$arr = explode('var rgGames = ', $html);
$parte1 = $arr[1];
$parte2 = explode(';', $parte1)[0];
echo $parte2;




// $doc = new DOMDocument();
// $doc->loadHTMLFile($url);
// $xpath = new DOMXPath($doc);
// $className = 'gameListRowItemName';
// $elements = $xpath->query('//div[@class="gameListRowItemName"]');
// $a = "a";
		
// echo $overMsg;
// echo "Acessando: " . $url . "<br>";

// $url = 'https://feriadosbancarios.febraban.org.br/feriados.asp?ano=2020';
//  $doc = new DOMDocument();
//  @$doc->loadHTMLFile($url); 
//   $xpath = new DOMXpath($doc);
//  $elements = $xpath->query('//td[@class="td_left"]');
//  $index = 0;

// echo "Encontrados " . $elements->length . " feriados bancarios";

// for ($index = 0; $index < $elements->length ; $index = $index+4) {
//     echo "<br><br>Data: " . $elements[$index+1]->textContent;
//     echo "<br>Dia: " . $elements[$index+3]->textContent;
    
//     $stringData = trim(preg_replace('/\s+/', ' ', $elements[$index+1]->textContent));
//     $nome       = trim(preg_replace('/\s+/', ' ', $elements[$index+3]->textContent));
//     $data 			= explode(' ', $stringData);
//     $mes			  = FeriadoBancario::getMesNumero($data[2]);
//     $date 			= DateTime::createFromFormat('d n Y', $data[0] . ' '. $mes . ' ' . $ano);
    
//     $feriadoAux				 = new FeriadoBancario();
//     $feriadoAux->nome	 = $nome;
//     $feriadoAux->data  = $date->format('Y-m-d');
//     $feriadoAux->save();
// }
?>