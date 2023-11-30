<?php
require_once("settings.php");
$paytmParams = array();
$orderId = $_POST["orderId"];
$TOKEN = $_POST["TOKEN"];

/* body parameters */
$paytmParams["body"] = array(

    "otp" => "888888",
    "fetchCashierData" => true
);

/* head parameters */
$paytmParams["head"] = array(
    "txnToken" => $TOKEN
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/login/validateOtp?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$note = "Validate OTP ";

write($url, $post_data, $res, MID, $orderid, $note);

?>
<html>

<head>
    <title> Validate OTP API</title>
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

    <form action="fetch_EMI.php" method="post" id="submit2" target="_blank">

        <input type="text" name="AMT" value="<?php echo $AMT ?>" id="AMT">
        <input type="text" name="orderId" value="<?php echo $orderId ?>" id="orderId">
        <input type="text" name="TOKEN" value="<?php echo $TOKEN ?>" id="TOKEN">
        <button type="submit" form="submit2" value="Submit">Submit For Fetch EMI details</button>

    </form>
    <br>
    <form action="FPO.php" method="post" id="submit3" target="_blank">

        <input type="text" name="AMT" value="<?php echo $AMT ?>" id="AMT">
        <input type="text" name="orderId" value="<?php echo $orderId ?>" id="orderId">
        <input type="text" name="TOKEN" value="<?php echo $TOKEN ?>" id="TOKEN">
        <button type="submit" form="submit3" value="Submit">Submit For FPO</button>

    </form>
    <form action="stand_check.php" method="post" id="submit4" target="_blank">

        <input type="text" name="AMT" value="<?php echo $AMT ?>" id="AMT">
        <input type="text" name="orderId" value="<?php echo $orderId ?>" id="orderId">
        <input type="text" name="TOKEN" value="<?php echo $TOKEN ?>" id="TOKEN">
        <button type="submit" form="submit4" value="Submit">Submit For Standard checkout</button>

    </form>
</body>

</html>