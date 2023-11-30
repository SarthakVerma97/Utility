<?php
require_once("settings.php");
$paytmParams       = array();
$txnToken           = $_POST["txnToken"];
$orderId = $_POST["orderId"];
$channel           = $_POST["channel"];
$paymode = $_POST["paymode"];

$paytmParams["head"]   = array(
    "channelId"      => "WEB",
    "txnToken"     => $txnToken,
    // "tokenType" => "TXN_TOKEN",
    "version" => "v1",
    "requestTimestamp"            => timeStamp,
);
$paytmParams["body"]   = array(
    "requestType"     => "NATIVE",
    "mid"         => MID,
    "orderId"       => $orderId,
    "paymentMode"     => $paymode,
    "channelCode"         => $channel,

);


$post_data         = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

// $url           = ENV . "/theia/api/v1/processTransaction?mid=" . MID . "&orderId=" . $orderId;
$url           = ENV . "/theia/api/v1/processTransaction?orderId=" . $orderId . "&mid=" . MID;


$res = hit_API($url, $post_data);
$note = "Process Transaction API ";

write($url, $post_data, $res, MID, $orderId, $note);

$data = json_decode($res, true);
$test     = $data["body"]["bankForm"];

$actionUrl     = $data["body"]["bankForm"]["redirectForm"]["actionUrl"];
$content     = $data["body"]["bankForm"]["redirectForm"]["content"];

?>
<!DOCTYPE html>

<head>
    <title> Process Transaction API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <fieldset>
        <legend>Request:</legend>
        <?php printt($post_data) ?>
    </fieldset>
    <fieldset>
        <legend>Response:</legend>
        <?php printt($res) ?>
    </fieldset>


    <form method="post" action="<?php echo $actionUrl ?>" id="abc" target="_blank">
        <?php
        foreach ($content as $name => $value) {
            echo '<input type="text" name="' . $name . '" value="' . $value . '"><br>';
        }
        ?>
        <button type="submit" form="abc" value="Submit">Submit for redirect</button>
    </form><br>
    <form action="customPolling.php" method="post" id="submit10" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo $orderId ?>" id="orderId">

        <input type="hidden" name="TOKEN" value="<?php echo $TOKEN ?>" id="TOKEN">
        <button type="submit" form="submit10" value="Submit">Submit For custom polling</button>

    </form>

</body>

</html>