<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("settings.php");
$host     = env("2");
$refid     = $random;
$custid = "CUST_" . $random;

$mid = "Eatsur84868171118643";
$key = "zqxkjX%s@SjCjeg4";
$paytmParams = array();

$paytmParams["body"]     = array(
    "mid"               => $mid,
    "cardId"       => "2017081376310f6a994ee9eae0d8fbc5debf65d47b481",
    "custId"     => "4982857",
);


$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $key);
$a = time();

$paytmParams["head"] = array(
    "channelId"  => "WEB",
    "tokenType"     => "SSO",
    "signature"        => $checksum,
    "version" => "v1",
    "timeStamp" => "$a",
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = $host . "/userAsset/deleteCard";
$res = hit_API($url, $post_data);

?>
<html>

<body>
<a href="https://www.pantaloons.com/verifypayments?pg=paytm&redirectBack=2c2e2323292e28&technology=react">test here</a>
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