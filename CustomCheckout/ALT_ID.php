<?php
require_once("./settings.php");

$paytmParams = array();


if (ENV == "https://securegw-stage.paytm.in") {
    $pubkey = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnDkMJZsOvYTlynIdNmRQI6K4V552/3bj4Sx6XIjxQn6AMj6delburHapDbYub6bnePsGuJdsZcs98MEsPAA2NGmpmxJIM5lDNsDsPajUjDmJntLvf07MCNV+ObzDeFYn7AHoXOXfDgGV4hBvDVu45Bt0J2+g7leuRVqOfSktYJEYGYWmUfdEaPjjfzf4DWpNZbMWoyWeP9WBnBtlXHnpC+n//vmmreX6Ofi5rGE+0oqrv7pxoZM5q8RKXXxTcgzXRMk5HvXr0+/biAWYTg0oth+vXu0x29TIBMS1Njp4g7T4dFyG6NljfGentgMSqLh2FE+ypSXPYUZHObqmGl8GkQIDAQAB
-----END PUBLIC KEY-----";
} else {
    $pubkey = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjT3YWjF4IlAiVjC3g65n7+3LEKqGQWQQgpG0wbdsg7kCgp/y4Lc7o+/e09SVaXDPXg7DXJ90WlucPvobMJvJijyioOmAk5hXdBZFa+RvUvzR5zGx0/QglNHGdWzyLvRTqHPbQz+WiDfln9O85xauVKHG+8e2Jn3UlPzhKSQ5/FU4t0EN8i0j8nYjFNVJ1ll8CxNZZMqVCfNCCrdcr+2fkZv7kohVX38QTJwThC98TCSqOUSKiTewFBOAyilZCOBxFfGKdtTe/EUCQtzeax9u0P2yYIQTa1IHcHNBfBRO8KOuMmuTA7peS2Bc+bO7lOyRfNTcKzZuDH4RfWSwPOy8ZQIDAQAB
-----END PUBLIC KEY-----";
}

$string = "{\"cardNumber\":\"4375518745700005\",\"expiryMonth\":\"08\",\"expiryYear\":\"2025\",\"securityCode\":\"170\"}"; //mine
// $string = "{\"cardNumber\":\"4761360073426701\",\"expiryMonth\":\"03\",\"expiryYear\":\"2024\",\"securityCode\":\"777\"}";
// $string = "{\"cardNumber\":\"5551530100027539\",\"expiryMonth\":\"04\",\"expiryYear\":\"2028\",\"securityCode\":\"676\"}";
// $string = "{\"cardNumber\":\"6080322940807777\",\"expiryMonth\":\"04\",\"expiryYear\":\"2028\",\"securityCode\":\"676\"}";
// $string = "{\"cardNumber\":\"5372060003442566\",\"expiryMonth\":\"03\",\"expiryYear\":\"2028\",\"securityCode\":\"275\"}";

// $string = "{\"cardNumber\":\"5241931272641006\",\"expiryMonth\":\"05\",\"expiryYear\":\"2025\",\"securityCode\":\"709\"}";

// $string = "{\"cardNumber\":\"6080320591469418\",\"expiryMonth\":\"04\",\"expiryYear\":\"2028\",\"securityCode\":\"676\"}";

try {
    if (!openssl_public_encrypt($string, $encrypted, $pubkey)) {
        throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
    }
    $data = base64_encode($encrypted);
} catch (Exception $e) {
    echo $e->getMessage();
}


$paytmParams["body"] = array(
    "mid" => MID,
    "authRefId"       => "authCode",
    "cardSource" => "MANUAL_ENTERED",
    "encryptedCardData" => "FWMldnrVCMFKnZJfktSJaovKawec96DH5QcafyX/G76cvICBrxpwS8zdug6apxynEEv3tyVBh0hfiUaUumVoIxNz2d5kLwiYenLbTNHx27TOqK7n4U4xbnMnZsyC9GXhy4jjDsNALN5FWE6AJPQ3KLwAqDPJpuQC4HW0Z51vGVsebsv9XWSvhPJ9zBCS2YHH2jw+lp6+g09g5lmFcspvewnqZENc3GlCO35LeTjXND+q3JgUDy4m6TAwMrZbVtZcofe9O2Etuxao5ZgRebBqj58fWtwoveBEY/4pD9TsSXRmpX/sGKMZ1m7926Rz8QPjZud0+4sGdlgPT9vpK+4SmQ==",
    "userInfo" => array(
        // "custId" => $custid,
        "custId" => "SARTHAk19971",
        "firstName" => "Sarthak",
        "lastName" => "Verma",
        "mobileNumber" => "7777777777"
    ),
    "amount" => array(
        "value" => "100",
        "currency" => "INR"
    )

);
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

$paytmParams["head"] = array(
    "signature"    => $checksum,
    "signatureType" => "CHECKSUM",
    "requestTimestamp" => timeStamp,
    "version" => "v1",
    "requestId" => refId
    // "channelId" => "WEB"
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/coft-center/coft/merchant/" . MID . "/token/gc/generateTokenData?requestId=" . refId;
$res = hit_API($url, $post_data);
$a = $res;
$data = json_decode($a, true);
$respBody = $data["body"];
$paytmChecksum = $data["head"]["signature"];
$isVerifySignature = PaytmChecksum::verifySignature(json_encode($respBody), MKEY, $paytmChecksum);

$note = "ALT ID API ";

write($url, $post_data, $res, MID, orderId, $note);

?>
<html>

<head>
    <title> ALT ID API</title>
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