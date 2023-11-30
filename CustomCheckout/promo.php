<?php
error_reporting(E_ERROR | E_PARSE | E_NOTICE);
// require_once("./settings.php");
echo "test2";
echo "test";
// $paytmParams = array();
// $paytmParams["body"] = array(
//     "mid" => MID,
//     "custId" => "7237636",
//     "promocode" => "",
//     "paymentOptions" => array(

//         "transactionAmount" => "",
//         "payMethod" => "",
//         "cardNo" => ""
//     ),
//     "totalTransactionAmount" => ""
// );
// $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

// $paytmParams["head"] = array(
//     "token"    => $checksum,
//     "tokenType" => "CHECKSUM",
//     "channelId" => "WEB"
// );
// $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

// $url = ENV . "/theia/api/v2/applyPromo?mid=" . MID;

// $res = hit_API($url, $post_data);
?>
<!-- <html>

<head>
    <title> Apply Promo API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


</html> -->