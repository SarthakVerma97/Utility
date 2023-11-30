<?php
require_once("settings.php");
$paytmParams       = array();
$TOKEN           = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paytmParams["head"]   = array(
    "channelId"      => "WEB",
    "txnToken"     => $TOKEN,
    // "tokenType" => "TXN_TOKEN",
    // "version" => "v1",
    // "requestTimestamp"            => timeStamp,
);
$paytmParams["body"]   = array(
    "requestType"     => "NATIVE",
    "mid"         => MID,
    "orderId"       => $orderId,
    "paymentMode"     => "CREDIT_CARD",
    // "channelId"      => "WEB",
    // "channelCode"         => "SSFB",
    // "aggMid"  => $mid,
    // "emiType"            => "DEBIT_CARD", //BANK_TRANSFER
    // "paymentFlow"         => "ADDANDPAY",
    // "mpin" => "",
    // "planId"            => "ICICI|3",
    // "cardInfo"             => "647473602326834f66fcaa22||275|",
    // "cardInfo"              => "||123|",
    // "cardInfo"              => "|||",

    // "cardInfo"             => "|4748469276114002|621|122024", // icici cc
    // "cardInfo" 			=> "|5321351850380989|621|122024",// icici cc

    // "cardInfo" 			=> "|4722540251069138|404|102032",//icici dc
    "cardInfo"             => "|4375514464789600|717|102033", //icici cc neelkesh
    // "cardInfo"             => "|4375084487343801|717|102023", //icici cc neelkesh

    // "cardInfo" 			=> "|4617950101138520|111|122032",//citi cc
    // "cardInfo" 			=> "|4386280530289234|404|102022",//citi cc  4375510330100774
    // "cardInfo" 			=> "|4160210822240894|123|012024",//hdfc dc
    // "cardInfo" 			=> "|4213280822240894|123|012024",//hdfc dc
    // "cardInfo" 			=> "|4893772505098125|111|122032",//hdfc cc
    // "cardInfo" 			=> "|5241810403461791|404|102032",//hdfc cc
    // "cardInfo"             => "|4160211602079676|170|082025", //hdfc dc mibe
    // "cardInfo"             => "|5372060003442566|275|032028", //hdfc cc mibe
    // "cardInfo"             => "|6080320591469418|676|042028", //hdfc dc mibe

    // "cardInfo"             => "|4160210309561424|099|042023", //hdfc dc

    // "cardInfo"             => "|6522360049230547|529|062025", //axis dc 
    // "cardInfo"             => "|36101105273258|529|062025", //hdfc cc 

    // "cardInfo"             => "|4477468695180658|123|102024", //hdfc cc
    // "cardInfo"             => "|4375515681521007|123|102024", //hdfc cc
    // "cardInfo"             => "|4519215271244964|123|102024", //internationa; cc
    // "cardInfo"             => "|6080322940807777|123|102024", //hdfc cc
    // "cardInfo"             => "|4761360075863216|123|102024", //hdfc cc coft visa
    // "cardInfo"             => "|4761360073426701|123|102024", //hdfc cc coft visa
    // "cardInfo"             => "|6080322940807777|123|102024", //hdfc cc coft rupay

    // "cardInfo"             => "|5551530100027539|123|012031", //hdfc cc
    // "cardInfo"             => "|4400060116913288|447|062027", //axis cc
    // "cardInfo"             => "|4375513539566001|404|102032", //icici cc
    // "cardInfo"             => "|4047458069100037|111|062025", //SBI cc
    // "cardInfo"             => "|4722540031369154|404|082024", //icici dc
    // "cardInfo"             => "|4123412341234123|123|012023",
    // "cardInfo"             => "|5241814174654881|404|082024", //hdfc dc
    // "cardInfo"             => "|4160215689237099|676|042028", //hdfc dc
    // "cardInfo"             => "|5242165000203040|676|042028", //hdfc dc
    // "cardInfo"             => "|4726428045550728|040|022025", //hdfc dc
    // "cardInfo"             => "|4375516245056001|040|022025", //icici cc
    // "cardInfo"             => "|379871215831014|0400|102024", //amex cc
    // "cardInfo"             => "|4073520265878000|040|102024", //icici cc
    //  "cardInfo"             => "|4519215271244964|040|102024", //icici cc
    // "cardInfo"             => "|4375516245056001|575|082025", //icici cc
    // "cardInfo"             => "|4315812287755003|024|092028", //icici cc
    // "cardInfo"             => "|5551533051515098|024|092028", //icici cc
    // "cardInfo"             => "|5241931272641006|024|092028", //axis cc
    // "cardInfo"             => "|5260990226104202|024|092028", //hdfc dc
    // "cardInfo"             => "|4375518745700005|314|012024", //hdfc dc
    // "cardInfo"             => "|4160210853586066|314|012024", //hdfc dc aneesh
    // "cardInfo"             => "|4160211603037350|314|012024", //hdfc dc aneesh
    // "cardInfo"             => "|376913280661000|1926|112025", //amex
    // "cardInfo"             => "|6530196659307997|192|112025", //amex
    // "payerAccount"     => "7405329843@paytm",
    // "authMode"             => "otp",
    // "dccSelectedByUser" => "true",
    // "issuingBankCode" => "BBK",
    // "txnAmount" 				=> array(
    // "value" => "7187.49",
    // "currency" => "INR",
    // ),

    // "accountNumber"		=> "917405329843",
    // "channelCode"			=> "otp",
    //  "cardInfo" 			=>  "2020052715920c571997bf88801679f9d3cd6de7b8784||676|",
    // "cardInfo" 		=>  null,
    // "authMode"       => "OTP",
    // "osType"                => "IOS",
    // "pspApp"                => "PAYTM",
    // "storeInstrument"     => "1",
    // "preferredOtpPage" => "bank",
    // "cardPreAuthType" => "STANDARD_AUTH",
    // "coftConsent" => array(
    //     "userConsent" => "1",
    //     // "createdAt" => "1655787955575"
    //     "createdAt" => "May 16, 2023 09:46:54 AM"
    // ),
    // "cardTokenInfo" => array(
    //     "cardToken" => "9999920419999088",
    //     "tokenExpiry" => "042025",
    //     "TAVV" => "AgAAAAAA1684305684355NXgyoAAAA=",
    //     "cardSuffix" => "6074",
    //     "panUniqueReference" => "EE6E308B05A77989D3DE51E73F055ADF8515FE3FDB726733660266180C3997D0",
    //     "tokenUniqueReference" => "87eee50b-fb93-4e8c-bdd5-008d62671489",
    //     "merchantTokenRequestorId" => "INGAUPAYTJUBIWIBPAY35477"
    // )
);


$post_data         = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

// $url           = ENV . "/theia/api/v1/processTransaction?mid=" . MID . "&orderId=" . $orderId;
$url           = ENV . "/theia/api/v1/processTransaction?orderId=" . $orderId . "&mid=" . MID;


$res = hit_API($url, $post_data);
$note = "Process Transaction API ";

write($url, $post_data, $res, MID, $orderId, $note);

$data = json_decode($res, true);
$test     = $data["body"]["bankForm"];
echo $deep = $data["body"]["deepLinkInfo"]["deepLink"];

$actionUrl     = $data["body"]["bankForm"]["redirectForm"]["actionUrl"];
$content     = $data["body"]["bankForm"]["redirectForm"]["content"];
// target="_blank"
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
    <form action="customPolling2.php" method="post" id="submit10" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo $orderId ?>" id="orderId">

        <input type="hidden" name="TOKEN" value="<?php echo $TOKEN ?>" id="TOKEN">
        <button type="submit" form="submit10" value="Submit">Submit For custom polling</button>

    </form>
    <a href="<?php echo $deep; ?>">Intent</a>

</body>

</html>