<?php
include "apikey.php";

header('Content-Type: application/json');
readfile(sprintf("https://api.etherscan.io/api?module=proxy&action=eth_blockNumber&apikey=%s",$apikey));

?>
