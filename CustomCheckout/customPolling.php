<?php
require_once("settings.php");
$paytmParams = array();
$TOKEN = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams['body'] = array(
    "orderId"           => $orderId,
    "mid"   => MID
);
$paytmParams['head'] = array(
    "tokenType"   => "TXN_TOKEN",
    "version"   => "v2",
    "token"   => $TOKEN,
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/v1/transactionStatus";
$i = 0;

$res = hit_API($url, $post_data);
// echo "Request: <br>";
// $x = json_decode($post_data, true);
// $y = json_encode($x, JSON_PRETTY_PRINT);
// printf("<pre>%s</pre>", $y);
// echo "Response: <br>";
// $x = json_decode($res, true);

// $y = json_encode($x, JSON_PRETTY_PRINT);
// printf("<pre>%s</pre>", $y);

$note = "Custom Polling page";

write($url, $post_data, $res, MID, $orderId, $note);
?>
<html>

<head>
    <title> Custom Polling Page</title>
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