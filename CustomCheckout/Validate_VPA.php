<?php
require_once("settings.php");
$orderId = $_POST["orderId"];
$TOKEN = $_POST["TOKEN"];

$paytmParams = array();

$paytmParams["body"] = array(
    "vpa"      => "7661982006@ybl",
    // "numericId" => "7405329843",
    "mid"        => MID,
    // "orderId" => $orderId
);

$paytmParams["head"] = array(
    "txnToken" => $TOKEN,
    "tokenType" => "TXN_TOKEN",
    "channelId" => "WEB"
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/vpa/validate?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
// print_details($post_data, $res);
$note = "Validate VPA ";

write($url, $post_data, $res, MID, $orderid, $note);

?>
<html>

<head>
    <title> Validate VPA API</title>
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