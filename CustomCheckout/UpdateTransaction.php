<?php
require_once("settings.php");
$paytmParams = array();
$orderId                 = $_POST["orderId"];
$TOKEN                     = $_POST["TOKEN"];
// $mid                     = $_POST["mid"];
// $key                     = $_POST["key"];
// $host                    = $_POST["HOST"];

$paytmParams["body"] = array(
    "txnAmount"    => array(
        "value"    => "1.00",
        "currency" => "INR",
    ),
    "userInfo"     => array(
        "custId"   => "1234",
    ),
);


$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

$paytmParams["head"] = array(
    "txnToken"     => $TOKEN,
    // "signature"    => $checksum
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/updateTransactionDetail?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
write($url, $post_data, $res, MID, $orderid, $note);

?>
<html>

<head>
    <title> Update Transaction API</title>
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