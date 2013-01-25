<?php
//If you RBP has problems to send a command, set this higher so its get send more often
//Default = 1;
$retryCount = 1;

$groups[1]["name"] = "Wohnzimmer";
$groups[1]["systemcode"] = "10000";

$groups[2]["name"] = "Schlafzimmer";
$groups[2]["systemcode"] = "11000";

$sockets[1]["name"] = "Fernseher";
$sockets[1]["groupid"] = "1";
$sockets[1]["socketid"] = "1";

$sockets[2]["name"] = "Lichterkette";
$sockets[2]["groupid"] = "1";
$sockets[2]["socketid"] = "2";

$sockets[3]["name"] = "Leseleuchte";
$sockets[3]["groupid"] = "1";
$sockets[3]["socketid"] = "3";

$sockets[4]["name"] = "Schreibtisch";
$sockets[4]["groupid"] = "1";
$sockets[4]["socketid"] = "4";

$sockets[5]["name"] = "Indirekt";
$sockets[5]["groupid"] = "2";
$sockets[5]["socketid"] = "1";
?>
