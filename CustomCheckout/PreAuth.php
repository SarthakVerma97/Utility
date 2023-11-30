<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("settings.php");

// $mid 	= "INTEGR77698636129383";
// $key 	= "0@z#pqDCwqYHqWHT";
// $mid     = "fafosr16695417736194";
// $key     = "A0spqjJ7cisQ7s!#";
// // $mid 	= "Xiaomi19521492133061";
// // $key 	= "hV!&4Lpi4EtXF4ay";
// // $mid 	= "Margpa43319644519696";
// // $key 	= "GGHxeeWtmke4Bs!1";
// $mid         = "Lenovo00235915466341";
// $key         = "LMJhSma4x&yYsi3!";
// $mid = "Flipka12223589978272";
// $key = "FNPPisDw06Vf3crG";
// $mid         = "Flipka65512000165781";
// $key         = "mm7x4V!bKMVaVsE3";
$checksum = "";
$paytmParams = array();
$paytmParams["head"] = array(
    "channelId"  => "WEB",
    "clientId" => "c11",
    "signature"        => $checksum
);
$amt = "110";
$paytmParams["body"]     = array(
    "mid"       => MID,
    "orderId" => orderId,
    "txnAmount" => $amt,
    // "paymentMode" => "CREDIT_CARD",
    "preAuthBlockSeconds" => "3600",
    "websiteName" => "DEFAULT",
    "callbackUrl" => callback,
    // "cardPreAuthType" => "STANDARD_AUTH",
    "blockType" => "PAYCONFIRM",
    "expiryAction" => "RELEASE",
    // "multiCaptureAllowed" => "true",

    // "preAuthExpiryDate" => "2022-07-15",
    // "paytmSsoToken"     => "e1eac756-1b34-4dfb-bf81-ecc070779600",
    // "paytmSsoToken"     => "eyJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiZGlyIn0..VdGw17IiQF-VmSXd.LrDA3t9CszWs57CjAl8Bn2YXh0KmmxynFRoVgvoYagKISkixXzKzKEmir76O0oRqRPwjuXcs7ECJl7ePKqsNE9rRXWE-o6Z5hnmOsENRsGkZotjiKUUi_UOO6BcIsk8R3hsZyUNvf4bUdHPD1kM73LH8aRAd7htPbulYB6D8T_LWIhZs1GwuYsF631wOSVheKCHeYWi1c_IBA30cHYDVwce7nPW86DBzkWFc7p0CxUMvI8u_LkKw.M1dwNNdYNPv75AFq0haKNw3000",
    "userInfo"                     => array(
        // "custId" => custId,
        "custId" => "USER_ID_1"
    ),
    // "type"				=> "MERCHANT",
    // "custId" => "SARTHAK",

    // "txnTokenRequired" => "true"

);


$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);
$paytmParams["head"]["signature"] = $checksum;


$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/order/v2/preAuth";

$res = hit_API($url, $post_data);
// fwrite($url, $post_data, $res, $mid, $ORDER_ID);

$data = json_decode($res, true);
$token = $data["body"]["txnToken"];
$note = "Preauth API";
write($url, $post_data, $res, MID, orderId, $note);

?>
<html>

<head>
    <title> PreAuth API</title>
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

    <form action="Process_transaction.php" method="post" id="submit1" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
        <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
        <button type="submit" form="submit1" value="Submit">Submit For Native</button>
    </form>
    <form action="blink.php" method="post" id="blink" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
        <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
        <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
        <button type="submit" form="blink" value="Submit">Submit For Blink</button>
    </form>
    <form action="FPO.php" method="post" id="fpo" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
        <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
        <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
        <button type="submit" form="fpo" value="Submit">Submit For fpo</button>
    </form>
    <form action="Fetch_Bin.php" method="post" id="submit3" target="fetch_bin">
        <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
        <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
        <button id="fetch_bin" form="submit3">fetch bin</button>
    </form>

</body>


</html>