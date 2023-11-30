<?php
require_once("./settings.php");

$paytmParams = array();
$paytmParams["body"] = array(
    "mid" => MID,

    // "merchantOrderId" => "999831590556101",
    "fromDate" => "2023-11-11T00:00:00+08:00",
    "toDate" => "2023-11-18T13:36:00+08:00",
    "orderSearchType" => "TRANSACTION",
    "orderSearchStatus" => "SUCCESS",
    "pageNumber" => "1",
    "pageSize" => "20",
    // "payMode" => "UPI"
);

$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);
$paytmParams["head"] = array(
    "signature"    => $checksum,
    "tokenType" => "CHECKSUM",
    "version" => "v1",
    "requestTimestamp" => "$a"
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/merchant-passbook/search/list/order/v2";
$res = hit_API($url, $post_data);
// $note = "OrderList API ";

// write($url, $post_data, $res, MID, $orderid, $note);

?>
<html>

<head>
    <title> Order List API</title>
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