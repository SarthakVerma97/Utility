<?php
require_once("settings.php");

$orderId                 = $_POST["orderId"];
$TOKEN                     = $_POST["TOKEN"];
$mid                     = $_POST["mid"];
$host                    = $_POST["HOST"];
$amt                    = $_POST["AMT"];
?>
<html>

<head>
    <title>Js Element Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>


    <div id="card"></div>

    <div id="upi"></div>

    <div id="nb"></div>

    <div id="wallet"></div>

    <div id="qr"></div>

    <script>
    function onScriptLoad() {

        //Check if CheckoutJS is available
        if (window.Paytm && window.Paytm.CheckoutJS) {

            //Add callback function to CheckoutJS onLoad function
            window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                //Config
                var config = {
                    flow: "DEFAULT",
                    // hidePaymodeLabel: true,
                    data: {
                        orderId: "<?php echo $orderId; ?>",
                        amount: "<?php echo $amt; ?>",
                        token: "<?php echo $TOKEN; ?>",
                        tokenType: "TXN_TOKEN"
                    },
                    merchant: {
                        mid: "<?php echo $mid; ?>"
                    },
                    handler: {
                        notifyMerchant: function(eventType, data) {
                            console.log("notify merchant called", eventType, data);
                        }
                    }
                };

                //Create elements instance
                var elements = window.Paytm.CheckoutJS.elements(config);
                // Create card element
                var cardElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.CARD, {
                    root: "#card",
                    style: {
                        bodyBackgroundColor: "white"
                    }
                })
                var upiElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.UPI, {
                    root: "#upi",
                    style: {
                        bodyBackgroundColor: "white"
                    }
                })
                var nbElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.NB, {
                    root: "#nb",
                    style: {
                        bodyBackgroundColor: "white"
                    }
                })
                var walletElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE
                    .PAY_WITH_PAYTM, {
                        root: "#wallet",
                        style: {
                            bodyBackgroundColor: "white"
                        }
                    })
                var qrElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.SCAN_AND_PAY, {
                    root: "#qr",
                    style: {
                        bodyBackgroundColor: "white"
                    }
                });
                //Render element
                cardElement.invoke();
                upiElement.invoke();
                nbElement.invoke();
                walletElement.invoke();
                qrElement.invoke();
            });
        }
    }
    </script>
    <script type="application/javascript" crossorigin="anonymous"
        src="<?php echo $host; ?>/merchantpgpui/checkoutjs/merchants/<?php echo $mid; ?>.js" onload="onScriptLoad();">
    </script>

</body>

</html>