<?php
require_once("./settings.php");

$paytmParams = array();
$paytmParams["body"] = array(
    "mid" => MID,
    "authRefId" => "tD6M84AcB0vT",
    "cardSource" => "CARD_ON_FILE",
    "encryptedCardData" => "FAvUe4uMs9uHPBCGDiCYPpYsZ+2sr3Weuj3W+UrKXraC+h\/5bw2bDVKIa9en7z8XmpYF60KU8gGOqfQGI7jm4Bj2+lG1\/had9bvy2pKkD+FEHMyGXkOanA1dZKkY8TSaJmUziYk9+Gd+y8wqQFEw7F\/ZRcghC30sRCCpXNmlAAcrLILc3NH+3amNJJ5s7uYRosX2I4TM9KYGYeIOL+\/Ud4utrvbMYFj2Hh7GDrk0DP0dLldskUVwlVEQl10MqoobkcP0OfphI9XEUHzRiaOaHaldqWDh\/BQi\/x0OZajtBSsTpIVUQLVvljsT\/BvQfcyAJc+LPHHwDVFdNNY089VZ4A==",
    "userInfo" => array(
        "custId" => "123456"
    ),
    "amount" => array(
        "value" => "1",
        "currency" => "INR"
    ),
    "paymentType" => "ECOM"
);
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

$paytmParams["head"] = array(
    "signature"    => $checksum,
    "version" => "v1",
    "requestTimestamp" => $a,
    "signatureType" => "CHECKSUM",
    "channelId" => "WEB",
    "requestId" => orderId
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/coft/merchant/".MID."/token/gc/generateTokenData?requestId=".refId;
$res = hit_API($url, $post_data);
// $a = $res;
// $data = json_decode($a, true);
// $respBody = $data["body"];
// $paytmChecksum = $data["head"]["signature"];
// $isVerifySignature = PaytmChecksum::verifySignature(json_encode($respBody), MKEY, $paytmChecksum);
// if ($isVerifySignature) {
//     echo "</br>Checksum Matched";
// } else {
//     echo "</br>Checksum Mismatched";
// }
// $note = "Transaction Status API ";

// write($url, $post_data, $res, MID, orderId, $note);

?>
<html>

<head>
    <title> Transaction Status API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
    async function copyRequest() {
        // Clipboard API supported?
        if (!navigator.clipboard) return;
        var value = document.getElementById("request");
        textContent = value.textContent;

        console.log(textContent);
        // copy text to clipboard
        if (navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(textContent);
        }

        // get text from clipboard
        if (navigator.clipboard.readText) {
            const text = await navigator.clipboard.readText();
            // console.log(text);
        }
    }
    async function copyResponse() {
        // Clipboard API supported?
        if (!navigator.clipboard) return;
        var value = document.getElementById("response");
        textContent = value.textContent;

        console.log(textContent);
        // copy text to clipboard
        if (navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(textContent);
        }

        // get text from clipboard
        if (navigator.clipboard.readText) {
            const text = await navigator.clipboard.readText();
            // console.log(text);
        }
    }
    </script>

</head>


<body>


    <fieldset>
        <button onclick="copyRequest()">copy request</button>
        <legend>Request:</legend>
        <div id="request">
            <?php printt($post_data) ?>
        </div>
    </fieldset>
    <fieldset>
        <button onclick="copyResponse()">copy response</button>
        <legend>Response:</legend>
        <div id="response">
            <?php printt($res) ?>
        </div>
    </fieldset>

</html>