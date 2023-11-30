<?php
require_once("./settings.php");
$paytmParams = array();
$TOKEN = "82352437ca7f47dd96859716f01dcda01645772705847";
$orderId = "ORDR_SARTHA95354880925730_20220225123504";

$paytmParams["head"] = array(
    "token" => $TOKEN,
    "tokenType" => "TXN_TOKEN",
    "channelId"                   => "WEB",
    "requestTimestamp"            => timeStamp,
    "version"                     => "v1"

);
$paytmParams["body"] = array(
    "mid" => MID,
    "returnToken" => "true",
    "orderId" => $orderId
);
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
$url = ENV . "/theia/api/v2/fetchPaymentOptions?mid=" . MID . "&orderId=" . $orderId;

$res = hit_API($url, $post_data);
$data = json_decode($res, true);
// $note = "Fetch Payment Option ";
// write($url, $post_data, $res, MID, $orderId, $note);

$paymode = array();
$login = "";
$balance = "0";
$savedInstruments = array();
$options = "";
$payList = array();
// echo $data["body"]["merchantPayOption"]["paymentModes"][0]["displayName"];

if ($data["body"]["resultInfo"]["resultStatus"] == "S") {
    // $paymode = $data["body"]["merchantPayOption"]["paymentModes"][0]["displayName"];
    $x = 0;


    do {
        // $i = 0;
        $options = $data["body"]["merchantPayOption"]["paymentModes"][$x]["displayName"];

        switch ($options) {
            case "Paytm Balance":
                $payList["Wallet"] = array("payMode" => "Wallet");
                if ($data["body"]["loginInfo"]["userLoggedIn"] == "true") {
                    $payList["Wallet"]["balance"] = $data["body"]["merchantPayOption"]["paymentModes"][$x]["payChannelOptions"][$x]["balanceInfo"]["subWalletDetails"][0]["balance"];
                }
                break;
            case "Debit Card":
                $payList["Debit Card"] = array("payMode" => "Debit Card");
                break;
            case "Credit Card":
                $payList["Debit Card"] = array("payMode" => "Debit Card");
                break;
            case "Net Banking":
                $payList["NetBanking"] = array("payMode" => "Net Banking");
                break;
            case "EMI":
                $payList["EMI"] = array("payMode" => "EMI");


                $i = 0;
                do {
                    $emichannel = $data["body"]["merchantPayOption"]["paymentModes"][$x]["payChannelOptions"][$i];
                    $payList["EMI"]["planDetails"][$i]["channelCode"] = $emichannel["channelCode"];
                    $payList["EMI"]["planDetails"][$i]["channelName"] = $emichannel["channelName"];
                    $payList["EMI"]["planDetails"][$i]["minAmount"] = $emichannel["minAmount"]["value"];
                    $payList["EMI"]["planDetails"][$i]["maxAmount"] = $emichannel["maxAmount"]["value"];
                    $payList["EMI"]["planDetails"][$i]["emiType"] = $emichannel["emiType"];
                    $i++;
                } while (isset($emichannel));
                break;
            case "BHIM UPI":
                $payList["BHIM UPI"] = array("payMode" => "BHIM UPI");
                $i = 0;
                do {
                    $upiOptions = $data["body"]["merchantPayOption"]["paymentModes"][$x]["payChannelOptions"][$i]["channelCode"];
                    $payList["UPI"][$i] = $upiOptions;
                } while (isset($upiOptions));
                break;
        }

        $x++;
    } while (isset($options));

    //     if ($data["body"]["loginInfo"]["userLoggedIn"] == "true") {
    //         $x = 0;
    //         do {
    //             $cardId = $data["body"]["merchantPayOption"]["savedInstruments"][$x]["cardDetails"]["cardId"];
    //             $cardType = $data["body"]["merchantPayOption"]["savedInstruments"][$x]["cardDetails"]["cardType"];
    //             $displayName = $data["body"]["merchantPayOption"]["savedInstruments"][$x]["displayName"];
    //             $channelCode = $data["body"]["merchantPayOption"]["savedInstruments"][$x]["channelCode"];
    //             $bankName = $data["body"]["merchantPayOption"]["savedInstruments"][$x]["bankName"];
    //             $savedInstruments[$x] = array(
    //                 "cardId" => $cardId,
    //                 "cardType" => $cardType,
    //                 "displayName" => $displayName,
    //                 "channelCode" => $channelCode
    //             );
    //             $x++;
    //         } while (isset($cardId));
    //     }
    //     $list = json_encode($payList, JSON_UNESCAPED_SLASHES);

    //     $data2 = json_decode($list, true);
    //     $resp2 = json_encode($data2, JSON_PRETTY_PRINT);
    //     printf("<pre>%s</pre>", $resp2);
}



?>
<html>

<head>
    <title> New FPO API</title>
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

</body>

</html>
<?php


?>