<?php
include "apikey.php";
$cacheFile = $cacheDir . "countdown-block-no";
header('Content-Type: application/json');

$blockNo = $_REQUEST["block_no"];

if (file_exists($cacheFile)) {
	$cacheMtime = filemtime($cacheFile);
} else {
	$cacheMtime = false;
}
if ($cacheMtime && $cacheMtime>time()-2){
 	$response = file_get_contents($cacheFile);
} else {
	file_put_contents($apiLogFile,sprintf(""),FILE_APPEND);
	$response = file_get_contents(sprintf("https://api.etherscan.io/api?module=block&action=getblockcountdown&blockno=%s&apikey=%s",$blockNo, $apikey));
	file_put_contents($cacheFile,$response);
}
print($response)

?>




