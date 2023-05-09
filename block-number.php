<?php
include "apikey.php";
$cacheFile = $cacheDir . "last-block-no";
header('Content-Type: application/json');

if (file_exists($cacheFile)) {
	$cacheMtime = filemtime($cacheFile);
} else {
	$cacheMtime = false;
}
if ($cacheMtime && $cacheMtime>time()-2){
 	$response = file_get_contents($cacheFile);
} else {
	
	$response = file_get_contents(sprintf("https://api.etherscan.io/api?module=proxy&action=eth_blockNumber&apikey=%s",$apikey));
	file_put_contents($cacheFile,$response);
}
print($response)

?>
