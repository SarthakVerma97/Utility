<?php
require_once("settings.php");
$paytmParams = array();
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams["body"] = array(
    "type" => "MERCHANT",
);

$paytmParams["head"] = array(
    "token" => $TOKEN,
    "tokenType" => "TXN_TOKEN",
    "channelId"                   => "WEB",
    "requestTimestamp"            => timeStamp,
    "version"                     => "v1"
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/fetchNBPaymentChannels?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$note = "Fetch NB Channels ";

write($url, $post_data, $res, MID, $orderId, $note);
$data = json_decode($res, true);

// $NBdetails = $data["body"]["nbPayOption"]["payChannelOptions"]["channelCode"];
// foreach ($NBdetails as $name => $value) {
//     echo  $name . '  -  ' . $value;
// }

?>
<html>

<head>
    <title> Fetch NB API</title>
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
    <?php $channel = $data["body"]["nbPayOption"]["payChannelOptions"][0]["channelCode"];
    $bank = $data["body"]["nbPayOption"]["payChannelOptions"][0]["channelName"];
    $i = 0;
    $NBdetails = array();
    echo "ChannelName - ChannelCode<br>";
    while (!empty($data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelName"])) { // echo ($i + 1) . " " ;
        //<option value="volvo">AIRP: AIRTEL PAYMENTS BANK</option>
        //<option value="volvo">AIRP: AIRTEL PAYMENTS BANK</option>
        echo $data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelCode"] . ": " .
            $data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelName"] . "<br>";
        // $msg = "<option value=\"" . $data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelCode"] . "\"> " .
        $data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelCode"] . ": " .
            $data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelName"] . "</option>";
        // echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') . "<br>";
        // echo $data["body"]["nbPayOption"]["payChannelOptions"][$i]["channelName"] . "<br>";
        $i = $i + 1;
    }
    echo "<br>" . $i;
    ?>

</body>

</html>