<?php

// My Hits 2
// www.laviska.com

$file = "my_hits.txt";
$user_ip = $_SERVER['REMOTE_ADDR'] . "\n";
$ip_list = file($file);
$visitors = count($ip_list) - 1;

if (in_array($user_ip, $ip_list)){
	echo "$visitors";
} else {
	$fp = fopen($file,"a");
	fwrite($fp, "\n$user_ip");
	fclose($fp);

	$visitors++;
	echo $visitors;
	}
?>