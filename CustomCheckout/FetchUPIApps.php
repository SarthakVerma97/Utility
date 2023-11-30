<?php
require_once("./settings.php");

$paytmParams = array();
$paytmParams["body"] = array(
    "mid" => MID,
);
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

$paytmParams["head"] = array(
    "token"    => $checksum,
    "tokenType" => "CHECKSUM"
    // "channelId" => "WEB"
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/fetchUPIOptions";
$res = hit_API($url, $post_data);
// $a = $res;
// $data = json_decode($a, true);
// $respBody = $data["body"];

$note = "Fetch UPI apps";

write($url, $post_data, $res, MID, orderId, $note);

?>
<html>
<head>
    <title>Fetch UPI apps</title>
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