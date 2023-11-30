<?php
require_once("./settings.php");
$paytmParams = array();
$AMT = $_POST["AMT"];
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams["head"] = array(
    "token" => $TOKEN,
    "tokenType" => "TXN_TOKEN",
    "channelId"                   => "WEB",
    "requestTimestamp"            => timeStamp,
    // "version"                     => "v1",
    // "workFlow"                    => "checkout"
);
$paytmParams["body"] = array(
    "mid" => MID,
    // "returnToken" => "true",
    "orderId" => $orderId,
    // "fetchPaytmInstrumentsBalance" => true,
    // "applyPaymentOffer" => "true",
    // "fetchAllPaymentOffers" => "true",
    // "requestId" => "1655960067592"
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
$url = ENV . "/theia/api/v2/fetchPaymentOptions?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$data = json_decode($res, true);
if (isset($data['body']['merchantPayOption']['paymentModes'])) {
    $paymentModes = $data['body']['merchantPayOption']['paymentModes'];

    foreach ($paymentModes as $paymentMode) {
        $displayName = $paymentMode['displayName'];

        echo "Display Name: $displayName<br>";

        if ($displayName === "BHIM UPI") {
            foreach ($paymentMode['payChannelOptions'] as $channelOption) {
                echo "Channel Code: " . $channelOption['channelCode'] . "<br>";
            }
        } elseif ($displayName === "Net Banking") {
            echo "Channel Code: Channel Name<br>";
            foreach ($paymentMode['payChannelOptions'] as $channelOption) {
                echo $channelOption['channelCode'] . " : " . $channelOption['channelName'] . "<br>";
            }
        } elseif ($displayName === "EMI") {
            foreach ($paymentMode['payChannelOptions'] as $channelOption) {
                echo "Channel Code: " . $channelOption['channelCode'] . "<br>";
                echo "Min Amount: " . $channelOption['minAmount']['value'] . " " . $channelOption['minAmount']['currency'] . "<br>";
                echo "Max Amount: " . $channelOption['maxAmount']['value'] . " " . $channelOption['maxAmount']['currency'] . "<br>";
                echo "EMI Type: " . $channelOption['emiType'] . "<br><br>";
            }
        }

        echo "<br>";
    }
}
$note = "Fetch Payment Option ";
write($url, $post_data, $res, MID, $orderId, $note);
?>
<html>

<head>
    <title> New FPO API</title>
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