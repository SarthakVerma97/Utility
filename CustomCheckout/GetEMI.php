<?php
require_once("settings.php");
$paytmParams = array();
$amt = $_POST["AMT"];
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams["body"] = array(
    "channelCode" => "ICICI",
    // "emiType"    => "DEBIT_CARD",
    // "amount" 				=> array(
    // "value" => $amt,
    // "currency" => "INR",
    // ),
);

$paytmParams["head"] = array(
    "txnToken"    => $TOKEN,
    "channelId"                   => "WEB",
    "requestTimestamp"            => timeStamp,
    "version"                     => "v1"
);

/* prepare JSON string for request */
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
$url = ENV . "/theia/api/v1/getEmiDetails?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$note = "Fetch EMI details ";

write($url, $post_data, $res, MID, $orderId, $note);
?>
<html>

<head>
    <title> Fetch EMI API</title>
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