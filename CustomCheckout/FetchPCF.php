<?php
require_once("settings.php");
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams = array();

/* body parameters */
$paytmParams["body"] = array(
    "payMethods" => array(
        array(
            "payMethod" => "NET_BANKING",
            // "instId" => "VISA"
        )
    ),
    //"paymentMode" => "CREDIT_CARD"
);
$paytmParams["head"] = array(
    "txnToken" => $TOKEN,
    "tokenType" => "TXN_TOKEN",
    "channelId" => "WEB",
    "requestTimestamp"            => timeStamp,
    "version"                     => "v1"
);
//{"head":{"version":"v1","requestTimestamp":1695814944953,"channelId":"WEB","token":"*********************************************","tokenType":"TXN_TOKEN","workFlow":"checkout","type":"TXN_TOKEN","requestId":"1695814942596"},"body":{"payMethods":[{"payMethod":"PAYTM_DIGITAL_CREDIT"},{"payMethod":"PPBL"},{"payMethod":"CREDIT_CARD"},{"payMethod":"DEBIT_CARD"},{"payMethod":"UPI"},{"payMethod":"NET_BANKING"},{"payMethod":"EMI"},{"payMethod":"BALANCE"}],"mid":"JPRCHA43405129394836","orderId":"L000171-105666","paymentFlow":"NONE","txnType":"NONE"}}
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/fetchPcfDetails?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$note = "Fetch PCF details ";

write($url, $post_data, $res, MID, $orderId, $note);


?>
<html>

<head>
    <title> Fetch PCF API</title>
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