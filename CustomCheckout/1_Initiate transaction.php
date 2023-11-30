<?php
error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("./settings.php");
// $paytmParams = array();
// $ipaddress = getenv("REMOTE_ADDR") ;
// echo "Your IP Address is " . getHostByName(getHostName());;

$paytmParams["head"] = array(
    // "clientId"                    => "c11",
    "channelId"                   => "WEB",
    // "requestTimestamp"            => timeStamp,
    // "version"                     => "v1"
);
$paytmParams["body"] = array(
    "requestType"                 => "Payment",
    // "aggMid"                         => MID,
    "mid"                         => MID,
    "orderId"                     => orderId,
    // "orderId"                     => "250114631qa",

    // "websiteName"                 => "xiaweb",
    "websiteName"                 => "DEFAULT",
    "callbackUrl"                 => callback,
    // "callbackUrl" => "https://stage-webapp.paytm.in/callback.php",

    // // "callbackUrl"                 => "https://eopuuicyqr0d8yi.m.pipedream.net",

    "txnAmount"                 => array(
        "value" => "13.00",
        "currency" => "INR",
    ),

    "userInfo"                     => array(
        "custId" => "SARTHAk19971", //614540
        // "custId" => "191323405", //614540

        // "custId" => custId,
        "mobile" => "7777777777",
        "email" => "abc@gmail.com",
        "firstName" => "Sarthak",
        "lastName" => "abc"
    ),
    // "simplifiedUnifiedOffers" => array(
    //     "promoDetails" => array(
    //         "promoCode" => "TESTCMBNKPRIC",
    //         "applyAvailablePromo" => "true",
    //         // "validatePromo" => "true",
    //         "isAmountBasedBankOffer" => "true",
    //         // "offerId" => "119762"
    //     ),
    //     // "subventionDetails" => array(
    //     //     "pgPlanId" => "ICICI|3",
    //     //     "isAmountBasedSubvention" => "true",
    //     //     "subventionAmount" => "150",
    //     //     "offerId" => "119763"
    //     // ),
    //     // "items" => array(
    //     //     "id" => "1234",
    //     //     "productId" => "454467484",
    //     //     "brandId" => "2325",
    //     //     "quantity" => "1",
    //     //     "categoryId" => "1234",
    //     //     "price" => "120"
    //     // )
    // ),
    // "emiSubventionToken" => "de770c9a25754899afb1b6b575e7c6331687507529909",
    // "payableAmount" => array(
    //     "value" => "14705.00",
    //     "currency" => "INR"
    // ),
    // "accountNumber" => "917777777777", //055201524098
    // "allowUnverifiedAccount" => "false",
    // "validateAccountNumber" => "true",
    // "SplitSettlementInfo" => array(
    //     "splitMethod" => "AMOUNT",
    //     "splitInfo" => array(
    //         "mid" => "GCLkfLOS122586997480",
    //         "amount" => "10"
    //     )
    // )
    // "MERC_UNQ_REF" => "250114631upi17886955",
    // "extendInfo"                => array(
    //     "udf1" => "udf11",
    //     "udf2" => "udf22",
    //     "udf3" => "udf33",
    //     "mercUnqRef" => "mercUnqReff",
    //     "comments" => "commentss",
    // ),
    // "goods" => array(
    //     array(
    //         "description" => "xfdskjfds",
    //         "quantity" => 1,
    //         "price" => array(
    //             "value"=> "5000.00",
    //             "currency" => "INR"
    //         )
    //     )
    // ),

    // "disablePaymentMode"            => array(
    //     array(
    //         "mode" => "CREDIT_CARD",
    //         // "channels" => array("NKMB"),
    //         // "banks" => array("NKMB")
    //     ),
    //     // array(
    //     //     "mode" => "UPI",
    //     //     "channels" => array("UPIPUSHEXPRESS"),
    //     // )
    // ),
    // "enablePaymentMode"            => array(
    //     // array(
    //     // "mode" => "CREDIT_CARD",
    //     // "channels" => array("UPIPUSHEXPRESS"),
    //     // "banks" => array("NKMB")
    //     // ),
    //     array(
    //         "mode" => "UPI",
    //         "channels" => array("UPIPUSHEXPRESS"),
    //     )
    // ),
    // "simplifiedPaymentOffers" => array(
    //     "applyAvailablePromo" => "true",
    //     // "promoCode" => "TESTGREMI1",
    //     // "validatePromo" => "true",
    //     // "cartDetails" => array(
    //     //     "items" => array(
    //     //         array(
    //     //             "amount" => "1500",
    //     //             "id" => "ITEMID_98765",
    //     //             "productDetail" => array(
    //     //                 "categoryIds" => array(
    //     //                     "1234"
    //     //                 ),
    //     //                 "brandId" => "5678",
    //     //                 "id" => "9182",

    //     //             ),

    //     //         )
    //     //     )
    //     // )
    // ),
    // "simplifiedSubvention" => array(
    //     "selectPlanOnCashierPage" => "true",
    //     // "subventionAmount" => "20000.00",
    //     // "offerDetails" => array(
    //     //     "offerId" => "105975"
    //     // ),
    //     // "planId" => "304154889228827652",
    //     "customerId" => "SARTHAk1997",
    //     // "mid" => MID,
    //     "items" => array(
    //         array(

    //             "model" => "9182",
    //             "id" => "ITEMID_98765",
    //             "quantity" => "1",
    //             "productId" => "9182",
    //             "price" => "1500",
    //             "brandId" => "5678",
    //             "categoryList" => array(
    //                 "1234"
    //             )
    //         )
    //     )
    // )
    // "shippingInfo" => array(
    //     "chargeAmount" => array(
    //         "value"=> "5000.00",
    //         "currency" => "INR"
    //     )
    // ),
    // "vanInfo" => array(
    //     "merchantPrefix" => "OBHY",
    //     "identificationNo" => "9879119070"
    // )
);
$paytmParams["head"]["signature"] = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);



$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/initiateTransaction?mid=" . MID . "&orderId=" . orderId;
// $url = ENV . "/theia/api/v1/initiateTransaction?mid=" . MID . "&orderId=250114631qa";


$res = hit_API($url, $post_data);
$data = json_decode($res, true);
$amt = $paytmParams["body"]["txnAmount"]["value"];

$token = $data["body"]["txnToken"];
$appInvokeURL = ENV . "/theia/api/v2/showPaymentPage?mid=" . MID . "&orderId=" . orderId . "&txnToken=" . $token . "&amount=" . $amt;
$note = "Initiate transaction API";
write($url, $post_data, $res, MID, orderId, $note);

?>
<html>


<head>
    <title> Initiate Transaction API</title>
    <script src="<?php echo ENV ?>/merchantpgpui/appinvoke"></script>
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

    <table>

        <tr>
            <td>

                <form action="Process_transaction.php" method="post" id="submit1" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit1" value="Submit">Native</button>
                </form>
            </td>
            <td>
                <form action="fetch_EMI_Details.php" method="post" id="submit2" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit2" value="Submit">Fetch EMI details</button>
                </form>
            </td>
            <td>
                <form action="Fetch_Bin.php" method="post" id="submit3" target="fetch_bin">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button id="fetch_bin" form="submit3">fetch bin</button>
                </form>
            </td>
            <td>
                <form action="FetchPCF.php" method="post" id="submit32" target="fetch_pcf">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button id="fetch_pcf" form="submit32">fetch pcf</button>
                </form>
            </td>
            <td>
                <form action="Fetch_NB_Channels.php" method="post" id="submit11" target="_blank">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <button type="submit" form="submit11" value="Submit">fetch NB channel</button>
                </form>
            </td>
            <td>
                <form action="stand_check.php" method="post" id="submit4" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit4" value="Submit">Standard checkout</button>
                </form>
            </td>
            <td>
                <form action="blink.php" method="post" id="submit5" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit5" value="Submit">JS checkout</button>
                </form>
            </td>
            <td>
                <form action="FPO.php" method="post" id="submit6" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit6" value="Submit">FPO NEW</button>
                </form>
            </td>
            <td>
                <form action="FPO_OLD.php" method="post" id="submit7" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit7" value="Submit">FPO OLD</button>
                </form>
            </td>
            <td>
                <form method="post" action="<?php echo $appInvokeURL ?>" name="f1" id="submitt" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <button type="submit" form="submitt" value="Submit">app invoke</button>
                </form>
            </td>
            <td>
                <form action="Send_OTP.php" method="post" id="submit9" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit9" value="Submit">Send OTP</button>
                </form>
            </td>
            <td>
                <form action="Send_OTP_router.php" method="post" id="submit9R" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="submit9R" value="Submit">Send OTP Router</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form action="PTC_Form.php" method="post" id="ptc_form" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="ptc_form" value="Submit">PTC form</button>
                </form>
            </td>
            <td>
                <form action="Validate_VPA.php" method="post" id="validatevpa" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="validatevpa" value="Submit">validatevpa</button>
                </form>
            </td>
            <td>
                <form action="js_elements.php" method="post" id="jselements" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
                    <button type="submit" form="jselements" value="Submit">jselemnets</button>
                </form>
            </td>
            <td>
                <form action="newElements.php" method="post" id="newelements" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <input type="hidden" name="AMT" value="<?php echo $amt ?>" id="AMT">
                    <button type="submit" form="newelements" value="Submit">new jselemnets</button>
                </form>
            </td>
            <td>
                <form action="Fetch Balance.php" method="post" id="fetchBalance" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="fetchBalance" value="Submit">fetch Balance</button>
                </form>
            </td>
            <td>
                <form action="UpdateTransaction.php" method="post" id="update" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="update" value="Submit">Update transaction</button>
                </form>
            </td>
            <td>
                <form action="ptc.php" method="post" id="ptc" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="ptc" value="Submit">ptc</button>
                </form>
            </td>
            <td>
                <form action="GetEMI.php" method="post" id="getEMI" target="_blank">
                    <input type="hidden" name="orderId" value="<?php echo orderId ?>" id="orderId">
                    <input type="hidden" name="TOKEN" value="<?php echo $token ?>" id="TOKEN">
                    <button type="submit" form="getEMI" value="Submit">get EMI</button>
                </form>
            </td>

            <td>
                <button onclick="window.invokeApp('<?php echo MID ?>', '<?php echo orderId ?>', '<?php echo $token ?>', '<?php echo $amt ?>')" target="_blank">Invoke app
                </button>
            </td>
            <td>
                <button onclick="window.invokeAppUsingIntent('<?php echo MID ?>', '<?php echo orderId ?>', '<?php echo $token ?>', '<?php echo $amt ?>')" target="_blank">Invoke app intent

                </button>
            </td>
        </tr>
    </table>
</body>

</html>