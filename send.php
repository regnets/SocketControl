<?php
include("config.php");

function sendCommand($systemcode, $socketid, $state, $retryCount) {
	$output  = "";
	$command = "sudo nice -n -20 /var/www/send " . $systemcode . " " . $socketid . " " . $state;

	$output = "Command: " . $command . "<br/>";

	for ($i = 1; $i <= $retryCount; $i++) {
		echo(exec($command));
	}
}


//Wenn retryCount nicht gesetzt ist, setzen wir es auf 1!
if (!isset($retryCount)) {
	$retryCount = 1;
}

switch ($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		$name    	= $_POST["name"];
		$state		= $_POST["state"];
		break;
	case 'GET':
		$name	    = $_GET["name"];
		$state		= $_GET["state"];
		break;
	default:
		die("Es wurden keine Variablen Uebergeben...");
}

$groupid	= substr($name,0,strpos($name,"_"));
$systemcode = $groups[$groupid]["systemcode"];
$socketcode = substr($name,strpos($name,"_")+1);

if ($socketcode != "0") {
	echo(sendCommand($systemcode, $socketcode, $state, $retryCount));
} else {
	for ($i = 1; $i <= sizeOf($sockets); $i++) {
		if ($sockets[$i]["groupid"] == $groupid) {
			$output .= sendCommand($systemcode, $sockets[$i]["socketid"], $state, $retryCount);
		}
	}
	echo("");
}
?>
