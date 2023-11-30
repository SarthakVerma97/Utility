<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
require_once("./settings.php");


$paytmChecksum = "";
$paramList = array();

$paramList = $_POST;
$mid = "";
$orderId = "";
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
if (isset($_POST) && count($_POST) > 0) {
	$mid = isset($_POST["MID"]) ? $_POST["MID"] : "";
	$orderId = isset($_POST["ORDERID"]) ? $_POST["ORDERID"] : "";
}
echo "<pre/>";
if (isset($_POST) && count($_POST) > 0) {
	foreach ($_POST as $paramName => $paramValue) {
		echo "<br/>" . $paramName . " = " . $paramValue;
	}
}
$b = "";
echo "<br>";
$isVerifySignature = PaytmChecksum::verifySignature($paramList, MKEY, $paytmChecksum);
if ($isVerifySignature) {
	echo $b = "Checksum Matched";
} else {
	echo $b = "Checksum Mismatched";
}
echo "<br>";
$response = json_encode($paramList, JSON_UNESCAPED_SLASHES);
//---------------------------------------Status API start
$paytmParams = array();
$paytmParams["body"] = array(
	"mid" => $mid,
	"orderId" => $orderId,
	// "txnType" => "PREAUTH"
);
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

$paytmParams["head"] = array(
	"signature"    => $checksum,
	"channelId" => "WEB"
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/v3/order/status";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$res = curl_exec($ch);

$data1 = json_decode($res, true);
$resp1 = json_encode($data1, JSON_PRETTY_PRINT);
printf("<pre>%s</pre>", $resp1);
//-------------------------------------Status API end

$sdate = "Date/Time: " . date("Y-m-d h:i:s a");
$filename = '/Applications/XAMPP/xamppfiles/htdocs/Test/CustomCheckout/logs.txt';
chmod("/Applications/XAMPP/xamppfiles/htdocs/Test/CustomCheckout/logs.txt", 0777);
if (is_writable($filename)) {

	$myfile = fopen($filename, "a") or die("Unable to open file!");
	fwrite($myfile, "\n\n ");
	fwrite($myfile, "Callback Response");
	fwrite($myfile, "/---------------------------------------------/\n");
	fwrite($myfile, $sdate);
	fwrite($myfile, "  ");
	fwrite($myfile, "Response ");
	fwrite($myfile, $response);
	fwrite($myfile, "\n");
	fwrite($myfile, "Verify signature: ");
	fwrite($myfile, $b);
	fwrite($myfile, "\n");
	fwrite($myfile, "Status Check for the order ");
	fwrite($myfile, "MID: ");
	fwrite($myfile, $mid);
	fwrite($myfile, " & orderId: ");
	fwrite($myfile, $orderId);
	fwrite($myfile, "\n");
	fwrite($myfile, "URL: ");
	fwrite($myfile, $url);
	fwrite($myfile, "\n");
	fwrite($myfile, "--> Request: ");
	fwrite($myfile, $post_data);
	fwrite($myfile, "\n");
	fwrite($myfile, "--> Response: ");
	fwrite($myfile, $res);
	fwrite($myfile, "\n");
	echo "\n";
	echo " logged successfuly";

	fclose($myfile);
} else {
	echo "The file $filename is not writable";
}
?>
<html>

<head>
	<title>Callback Response</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

</html>