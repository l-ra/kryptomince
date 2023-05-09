<?php
include "apikey.php";

$blockNo = $_REQUEST["block_no"];

if ($blockNo && preg_match("/^0x[0-9a-fA-F]+$/",$blockNo)) {
	$blockCacheFile = $cacheDir . "block-".$blockNo;
	header('Content-Type: application/json');
	if ( file_exists($blockCacheFile)){
		$response = file_get_contents($blockCacheFile);
	} else {
		$response = file_get_contents(sprintf("https://api.etherscan.io/api?module=proxy&action=eth_getBlockByNumber&tag=%s&boolean=true&apikey=%s",$blockNo,$apikey));
		if (preg_match("/".$blockNo."/",$response)){
			# have result - store it
			file_put_contents($blockCacheFile,$response);
		}
	}
	print($response);
} else {
	print('{"result":null}');
}
?>

