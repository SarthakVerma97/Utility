<?php
require_once("settings.php");
$paytmParams = array();
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams["body"] = array(
    "mobileNumber" => "7777777777"
);

$paytmParams["head"] = array(
    "txnToken" => $TOKEN
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/login/sendOtp?mid=" . MID . "&orderId=" . $orderId;


$res = hit_API($url, $post_data);

$note = "Send OTP";

write($url, $post_data, $res, MID, $orderId, $note);

?>
<html>

<head>
    <title>Send OTP API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <script>
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
    </script> -->

</head>


<body>


    <fieldset>
        <!-- <button onclick="copyRequest()">copy request</button> -->
        <legend>Request:</legend>
        <div id="request">
            <?php printt($post_data) ?>
        </div>
    </fieldset>
    <fieldset>
        <!-- <button onclick="copyResponse()">copy response</button> -->
        <legend>Response:</legend>
        <div id="response">
            <?php printt($res) ?>
        </div>
    </fieldset>
    <form action="Validate_OTP.php" method="post" id="submit1" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo $orderId ?>" id="orderId">

        <input type="hidden" name="TOKEN" value="<?php echo $TOKEN ?>" id="TOKEN">
        <button type="submit" form="submit1" value="Submit">Submit For Native</button>

    </form>
</body>

</html>