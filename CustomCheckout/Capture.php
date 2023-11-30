<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("settings.php");
// $mid 	= "INTEGR77698636129383";
// $key 	= "0@z#pqDCwqYHqWHT";
$mid     = "fafosr16695417736194";
$key     = "A0spqjJ7cisQ7s!#";
// $mid 	= "Xiaomi19521492133061";
// $key 	= "hV!&4Lpi4EtXF4ay";
// $mid 	= "Margpa43319644519696";
// $key 	= "GGHxeeWtmke4Bs!1";
// $mid 	= "Eatsur84868171118643";
// $key 	= "zqxkjX%s@SjCjeg4";
// $mid = "Flipka12223589978272";
// $key = "FNPPisDw06Vf3crG";
$mid         = "Flipka65512000165781";
$key         = "mm7x4V!bKMVaVsE3";
$mid         = "Lenovo00235915466341";
$key         = "LMJhSma4x&yYsi3!";
$mid         = "oBHypL96031422310676";
$key         = "e6vrPH2weEfINDn&'";
$mid         = "SARTHA61174731223358";
$key         = "8vz%MSkNMpFJB#ST'";
define('MID', 'SARTHA61174731223358');
define('MKEY', '8vz%MSkNMpFJB#ST');
$checksum = "";
$paytmParams = array();
$paytmParams["head"] = array(
    "channelId"  => "WAP",
    "clientId" => "merchant-flipkart-uat",
    "signature"        => $checksum,
    "requestTimestamp" => timeStamp,
    "version" => "v2"
);

$paytmParams["body"]     = array(
    "mid"       => MID,
    "orderId" => "ORDR_SARTHA95354880925730_20231102032858",
    "txnAmount" => "1",
    "preAuthId" => "20231102011620000926859557992222400",
    "deviceId" => "9999999999",
    "mercUnqRef" => "sdfdsfds",
    "payMode" => "EMI",
    "terminalCapture" => "true",
    "planId" => "ICICI|3",
    "appIp" => "0.0.0.0"
);

$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);
$paytmParams["head"]["signature"] = $checksum;


$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/order/v2/capture";

$res = hit_API($url, $post_data);

write($url, $post_data, $res, $mid, $orderid, $note);

?>
<html>

<head>
    <title> Capture API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <fieldset>
        <legend>Request:</legend>
        <?php printt($post_data) ?>
    </fieldset>
    <fieldset>
        <legend>Response:</legend>
        <?php printt($res) ?>
    </fieldset>

</body>


</html>