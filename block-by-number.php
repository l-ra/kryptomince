<?php
include "apikey.php";

$blockNo = $_REQUEST["block_no"];

if ($blockNo && preg_match("/^0x[0-9a-fA-F]+$/",$blockNo)) {
    header('Content-Type: application/json');
	readfile(sprintf("https://api.etherscan.io/api?module=proxy&action=eth_getBlockByNumber&tag=%s&boolean=true&apikey=%s",$blockNo,$apikey));
} else {
	print('{"result":null}');
}

?>

