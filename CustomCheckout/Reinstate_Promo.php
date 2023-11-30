<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("settings.php");
$host     = env("1");
$refid     = "ReIns_" . $random;
$orderId = "Ref_" . $random;
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
$paytmParams = array();
$a = time();
$paytmParams["head"] = array(
    // "channelId"  => "WEB",
    "clienId" => "c11",
    // "version" => "v1",
    // "requestTimestamp" => "$a"
);

$paytmParams["body"]     = array(
    "mid"               => $mid,
    "orderId"       => "ORDR_202109091631194346",
    "reinstateRefId" => $refid,
    "revokeAmount" => "10",
    // "refId" => $orkderId,
    "offerRevoke" => "false",
    "autoOfferRevoke" => "true"

);


$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $key);
$paytmParams["head"]["signature"] = $checksum;


$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
$url = $host . "/refund/api/v1/promo/reinstate/process";

$res = hit_API($url, $post_data);

$data = json_decode($res, true);
$token = $data["body"]["accessToken"];

?>
<html>

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