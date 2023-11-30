<?php
error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("./settings.php");
$paytmParams = array();

$paytmParams["head"]["clientId"] = "c11";
$paytmParams["head"]["channelId"] = "WAP";
$paytmParams["head"]["requestTimestamp"] = timeStamp;
$paytmParams["head"]["version"] = "v1";

$paytmParams["body"]["requestType"] = "Payment";
// $paytmParams["body"]["aggMid"] = "c11";
$paytmParams["body"]["mid"] = MID;
$paytmParams["body"]["orderId"] = orderId;
$paytmParams["body"]["websiteName"] = "DEFAULT";
$paytmParams["body"]["callbackUrl"] = callback;

$paytmParams["body"]["txnAmount"]["value"] = "100.00";
$paytmParams["body"]["txnAmount"]["currency"] = "INR";

$paytmParams["body"]["userInfo"]["custId"] = custId;
$paytmParams["body"]["userInfo"]["mobile"] = "7777744447";
$paytmParams["body"]["userInfo"]["email"] = "hkk@kjjk.com";
$paytmParams["body"]["userInfo"]["firstName"] = "sarthak";
$paytmParams["body"]["userInfo"]["lastName"] = "verma";

$paytmParams["body"]["extendInfo"]["udf1"] = "udf11";
$paytmParams["body"]["extendInfo"]["udf2"] = "udf22";
$paytmParams["body"]["extendInfo"]["udf3"] = "udf33";
$paytmParams["body"]["extendInfo"]["mercUnqRef"] = "mercUnqReff";
$paytmParams["body"]["extendInfo"]["comments"] = "comments11";

// $paytmParams["body"]["enablePaymentMode"][0]["mode"] = "BALANCE";
// $paytmParams["body"]["enablePaymentMode"][1]["mode"] = "UPI";
// $paytmParams["body"]["enablePaymentMode"][1]["channels"][0] = "UPIPUSH"; //intent
// $paytmParams["body"]["enablePaymentMode"][1]["channels"][1] = "UPIPUSHEXPRESS"; //push
// $paytmParams["body"]["enablePaymentMode"][1]["channels"][2] = "UPI"; //collect
// $paytmParams["body"]["enablePaymentMode"][2]["mode"] = "CREDIT_CARD";
// $paytmParams["body"]["enablePaymentMode"][2]["channels"][0] = "VISA";
// $paytmParams["body"]["enablePaymentMode"][2]["channels"][1] = "MASTER";
// $paytmParams["body"]["enablePaymentMode"][2]["channels"][2] = "RUPAY";

// $paytmParams["body"]["disablePaymentMode"][0]["mode"] = "BALANCE";
// $paytmParams["body"]["disablePaymentMode"][1]["mode"] = "UPI";
// $paytmParams["body"]["disablePaymentMode"][1]["channels"][0] = "UPIPUSH"; //intent
// $paytmParams["body"]["disablePaymentMode"][1]["channels"][1] = "UPIPUSHEXPRESS"; //push
// $paytmParams["body"]["disablePaymentMode"][1]["channels"][2] = "UPI"; //collect
// $paytmParams["body"]["disablePaymentMode"][2]["mode"] = "CREDIT_CARD";
// $paytmParams["body"]["disablePaymentMode"][2]["channels"][0] = "VISA";
// $paytmParams["body"]["disablePaymentMode"][2]["channels"][1] = "MASTER";
// $paytmParams["body"]["disablePaymentMode"][2]["channels"][2] = "RUPAY";

// $paytmParams["body"]["vanInfo"]["merchantPrefix"] = "KSPC";

// $paytmParams["body"]["autoRefund"] = "true";

// $paytmParams["body"]["emiSubventionToken"] = "074c900af5564c3da767c422be7769a51654752512156";
// $paytmParams["body"]["payableAmount"]["value"] = "100.00";
// $paytmParams["body"]["payableAmount"]["currency"] = "INR";

// $paytmParams["body"]["paytmSsoToken"] = "074c900af5564c3da767c422be7769a51654752512156";
// $paytmParams["body"]["isNativeAddMoney"] = "true";

// $paytmParams["body"]["validateAccountNumber"] = "true";
// $paytmParams["body"]["allowUnverifiedAccount"] = "yes";
// $paytmParams["body"]["accountNumber"] = "7777777777";

// $paytmParams["body"]["simplifiedPaymentOffers"]["promoCode"] = "KSPC";
// $paytmParams["body"]["simplifiedPaymentOffers"]["applyAvailablePromo"] = "KSPC";
// $paytmParams["body"]["simplifiedPaymentOffers"]["validatePromo"] = "KSPC";
// $paytmParams["body"]["simplifiedPaymentOffers"]["promoAmount"] = "KSPC";

// $paytmParams["body"]["simplifiedSubvention"]["customerId"] = "INR";
// $paytmParams["body"]["simplifiedSubvention"]["mid"] = "INR";
// $paytmParams["body"]["simplifiedSubvention"]["planId"] = "INR";
// $paytmParams["body"]["simplifiedSubvention"]["offerDetails"] = "INR";
// $paytmParams["body"]["simplifiedSubvention"]["selectPlanOnCashierPage"]["offerId"] = "INR";
// $paytmParams["body"]["simplifiedSubvention"]["subventionAmount"] = "INR";
// $paytmParams["body"]["cardTokenRequired"] = "true";

// $paytmParams["body"]["additionalInfo"]["ref1"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref2"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref3"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref4"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref5"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref6"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref7"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref8"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref9"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref10"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref11"] = "KSPC";
// $paytmParams["body"]["additionalInfo"]["ref12"] = "KSPC";


$paytmParams["body"]["splitSettlementInfo"]["splitMethod"] = "AMOUNT";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][0]["mid"] = "PMIFMF16360742527201";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][0]["amount"]["value"] = "12";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][0]["amount"]["currency"] = "INR";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][1]["mid"] = "PMIFMF16360742527201";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][1]["amount"]["value"] = "12";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][1]["amount"]["currency"] = "INR";
$paytmParams["body"]["splitSettlementInfo"]["splitMethod"] = "PERCENTAGE";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][0]["mid"] = "PMIFMF16360742527201";
$paytmParams["body"]["splitSettlementInfo"]["splitInfo"][0]["percentage"] = "12";



$paytmParams["head"]["signature"] = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);



$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

$url = ENV . "/theia/api/v1/initiateTransaction?mid=" . MID . "&orderId=" . orderId;
// $url = ENV . "/theia/api/v1/initiateTransaction?mid=" . MID . "&orderId=9876552012";


$res = hit_API($url, $post_data);
$data = json_decode($res, true);
$amt = $paytmParams["body"]["txnAmount"]["value"];

$token = $data["body"]["txnToken"];
$appInvokeURL = ENV . "/theia/api/v2/showPaymentPage?mid=" . MID . "&orderId=" . orderId . "&txnToken=" . $TOKEN . "&amount=" . $amt;
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