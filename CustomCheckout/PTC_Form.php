<?php
require_once("settings.php");

$TOKEN                     = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

$paramList["mid"] = MID;
$paramList["orderId"] = $orderId;
$paramList["txnToken"] = $TOKEN;
$paramList["paymentMode"] = "UPI";
// $paramList["planid"] = "ICICI|3";
$paramList["payerAccount"] = "test@paytm";
// $paramList["cardInfo"] = "|4761360075863216|123|032025";
// $paramList["encCardInfo"] = "IfHCJ2SHY6NVxscGN2Lco5/oGcxduVLV53f4xiBX4uw=";
// $paramList["AUTH_MODE"] = "otp";
// $paramList["coftConsent"] = "{\"userConsent\":1,\"createdAt\":\"January 19, 2023 04:57:45 PM\"}";
// $paramList["cardTokenInfo"] = "{\"cardToken\":\"4479682380060431\",\"tokenExpiry\":\"102023\",\"TAVV\":\"AgAAAAAA1649132702622NXgyoAAAA=\",\"cardSuffix\":\"3216\",\"panUniqueReference\":\"V0010013021295362620166880000\"}";


?>
<html>

<head>
    <title>PTC form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <form method="post" action="<?php echo ENV ?>/theia/api/v1/processTransaction?mid=<?php echo MID ?>&orderId=<?php echo $orderId ?>" name="paytm" id="abc" type="redirect">
        <?php
        foreach ($paramList as $name => $value) {
            echo $name . " - " . $value . "<br>";
            echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
        } ?>
        <button type="submit" form="abc" value="Submit">Submit For Native</button>
    </form>
</body>

</html>