<?php
require_once("settings.php");
$paytmParams = array();
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paymode = "PAYTM_DIGITAL_CREDIT";
$paytmParams["body"] = array(
    "paymentMode" => $paymode,
);
$paytmParams["head"] = array(
    "txnToken" => $TOKEN,
    "channelId"                   => "WEB",
    "requestTimestamp"            => timeStamp,
    "version"                     => "v1"
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

// $url = ENV . "/userAsset/fetchBalanceInfo?mid=" . MID . "&orderId=" . $orderId;
$url = ENV . "/theia/api/v1/fetchBalanceInfo?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$note = "Fetch Balance for " . $paymode;

write($url, $post_data, $res, MID, $orderId, $note);

?>
<html>

<head>
    <title> Fetch Balance Info API</title>
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

</body>

</html>