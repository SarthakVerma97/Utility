<?php
require_once("PaytmChecksum.php");
require_once("config.php");
error_reporting(0);
function printt(string $response)
{
	$x = json_decode($response, true);
	$y = json_encode($x, JSON_PRETTY_PRINT);
	printf("<pre>%s</pre>", $y);
}
$localIP = getHostByName(getHostName());
$date = date_default_timezone_set('Asia/Kolkata');
$random = date("Ymdhis");
$a = time();
define('timeStamp', $a);
// define('callback', "http://".getHostByName(getHostName())."/Test/CustomCheckout/pgResponse.php");
define('callback', "http://localhost/Test/CustomCheckout/pgResponse.php");

define('orderId', "ORDR_" . MID . "_" . $random);
// define('orderId', "ORDR_" . $random);

define('custId', "CUST_" . MID . "_" . rand(1, 100));
define('refId', "REF_" . MID . "_" . $random);

function hit_API($url, $post_data)
{
	$ch = curl_init($url);
	$options = array(
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $post_data,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array("Content-Type: application/json"),

		// Consider enabling SSL verification on production servers.
		CURLOPT_SSL_VERIFYPEER => false, // Recommended for development/testing only.
	);
	curl_setopt_array($ch, $options);
	$response = curl_exec($ch);

	$curl = curl_getinfo($ch);
	echo "Time Taken: " . $curl["total_time"] . "ms | http code: " . $curl["http_code"] . " | Port: " . $curl["primary_port"] . " | IP: " . $curl["local_ip"] . " | Connection Time: " . $curl["connect_time"] . "</br>";
	echo "URL: " . $url . "<br/>";
	echo $datetoday = "Date/Time: " . date("Y-m-d h:i:s a") . "<br>";
	if ($response === false) {
		echo 'Curl error: ' . curl_error($ch);
		return false;
	} else {
		return $response;
	}
}

// function write($url, $req, $res, $mid, $orderid, $note)
// {
// 	$sdate = "Date/Time: " . date("Y-m-d h:i:s a");
// 	$filename = '/Applications/XAMPP/xamppfiles/htdocs/Test/CustomCheckout/logs.txt';
// 	$logMessage = "\n\n " . $note . "/---------------------------------------------/\n" .
// 		$sdate . "  MID: " . $mid . " & orderId: " . $orderid . "\n" .
// 		"URL: " . $url . "\n" .
// 		"--> Request: " . $req . "\n" .
// 		"--> Response: " . $res;

// 	// Use file_put_contents to write to the file.
// 	if (file_put_contents($filename, $logMessage, FILE_APPEND | LOCK_EX) !== false) {
// 		return true; // Logging successful.
// 	} else {
// 		return false; // Logging failed.
// 	}
// }
function write($url, $req, $res, $mid, $orderid, $note)
{
	$sdate = "Date/Time: " . date("Y-m-d h:i:s a");
	$filename = '/Applications/XAMPP/xamppfiles/htdocs/Test/CustomCheckout/logs.txt';
	if (is_writable($filename)) {

		$myfile = fopen($filename, "a") or die("Unable to open file!");
		fwrite($myfile, "\n\n");
		fwrite($myfile, $note);
		fwrite($myfile, "/---------------------------------------------/\n");
		fwrite($myfile, $sdate);
		fwrite($myfile, "  ");
		fwrite($myfile, "MID: ");
		fwrite($myfile, $mid);
		fwrite($myfile, " & orderId: ");
		fwrite($myfile, $orderid);
		fwrite($myfile, "\n");
		fwrite($myfile, "URL: ");
		fwrite($myfile, $url);
		fwrite($myfile, "\n");
		fwrite($myfile, "--> Request: ");
		fwrite($myfile, $req);
		fwrite($myfile, "\n");
		fwrite($myfile, "--> Response: ");
		fwrite($myfile, $res);

		echo "logged successfuly";

		fclose($myfile);
	} else {
		echo "The file $filename is not writable";
	}
}



function env($environment)
{
	if ($environment == "1")
		$host = "https://securegw-stage.paytm.in";
	else if ($environment == "2")
		$host = "https://securegw.paytm.in";
	else if ($environment == "3")
		$host = "https://accounts-uat.paytm.com";
	else
		$host = "https://accounts.paytm.com";
	return $host;
}
