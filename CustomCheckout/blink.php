<?php
require_once("settings.php");

$TOKEN                     = $_POST["TOKEN"];
$amt                    = $_POST["AMT"];
$orderId = $_POST["orderId"];

?>
<html>

<head>
    <title>JS Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script type="application/javascript" crossorigin="anonymous" src="<?php echo ENV ?>/merchantpgpui/checkoutjs/merchants/<?php echo MID; ?>.js"></script>
</head>

<body style="background-color:#505050;text-align:center;">
    <div style="color:white">

        <button type="button" id="JSCheckout" name="submit" class="btn btn-primary" style="background-color:#808080;border:none;">Pay Now</button>
    </div>

    <div id="blink-response" style="color:black">
    </div>
    <script>
        document.getElementById("JSCheckout").addEventListener("click", function() {
            openBlinkCheckoutPopup('<?php echo $orderId ?>', '<?php echo $TOKEN ?>', '<?php echo $amt ?>');
        });

        function openBlinkCheckoutPopup(orderId, txnToken, amount) {
            // console.log(orderId, txnToken, amount);
            var config = {
                "root": "",
                // "style": {
                //     "bodyColor": "red",
                //     "themeBackgroundColor": "#808080",
                //     "themeColor": "red",
                //     "headerBackgroundColor": "#303030",
                //     "bodyBackgroundColor": "#181818",
                //     "headerColor": "white",
                //     "errorColor": "",
                //     "successColor": ""
                // },
                "flow": "DEFAULT",
                "data": {
                    "orderId": orderId,
                    "token": txnToken,
                    "tokenType": "TXN_TOKEN",
                    "amount": amount,
                    "userDetail": {
                        "mobileNumber": "7777777777",
                        // "name": "Sarthak Verma"
                    },

                },
                "merchant": {
                    // "redirect": false,
                    // "name": "Sarthak",
                    // "logo": "http://localhost/Test/CustomCheckout/logo.svg",
                    "callbackUrl": "",
                    "hidePaytmBranding": true,
                    "mid": "<?php echo MID ?>",
                    "multipleWindowWebview": false,
                },
                "locale": "hi-IN",
                // "payMode": {
                //     "labels": {
                //         "UPI": "UUPPII",
                //         "SCAN_AND_PAY": "wwwwwwwwww",
                //         "CARD": "ccccccccc",
                //         "NB": "Nnnnnnnnnn"
                //     },
                //     "filter": {
                //         // "include": ["SCAN_AND_PAY"],
                //         "exclude": ["CARD", "UPI", "NB", "EMI"]
                //     },
                //     // "order": ["UPI", "CARD", "NB", "PAY_WITH_PAYTM", "SCAN_AND_PAY"]
                // },
                // "emiSubvention": {
                //     "orderId": orderId,
                //     "strategy": "AMOUNT_BASED",
                //     "customerId": "CUST_202110191634636455",
                //     "subventionAmount": amount // subvention amount
                // },
                // "processing": {
                //     "label": {
                //         "heading": "Processssssiiiinnnnnggg",
                //         "info": ""
                //     },
                //     "error": {

                //     }
                // },
                // "mapClientMessage": {
                //     "static": {
                //         "label": {
                //             "paymodeSelection": "Select Paymode",

                //         },
                //         "error": {

                //         }
                //     }

                // },
                "handler": {
                    notifyMerchant: function(eventName, data) {
                        // console.log("notifyMerchant handler function called abc");
                        // console.log("eventName => ", eventName);
                        // console.log("data => ", data);
                        // if (eventName == 'SESSION_EXPIRED') {
                        //     location.reload();
                        // }
                        // if (eventName == 'APP_CLOSED') {
                        //     alert("Pop-up closed");
                        // }
                        // if (eventName == 'CARD_TYPE_INFO') {
                        //     console.log("data => ", data);
                        //     alert("card type info");
                        // }
                        console.log("notify merchant called", eventType, data);

                    },
                    transactionStatus: function(data) {
                        console.log("payment status ", data);
                        window.Paytm.CheckoutJS.close();
                        var result = "<h2>Response: </h2><table style=\"color:black;\">";
                        for (var key in data) {
                            if (data.hasOwnProperty(key)) {
                                result += "<tr><td>" + key + "</td><td>" + data[key] + "</td></tr>";
                            }
                        }
                        result += "</table>";
                        document.getElementById("blink-response").innerHTML = result;
                    }
                }
            };
            if (window.Paytm && window.Paytm.CheckoutJS) {
                // initialze configuration using init method 
                window.notifyMerchant = config.handler.notifyMerchant;
                window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                    // after successfully updating configuration, invoke checkoutjs
                    window.Paytm.CheckoutJS.invoke();
                }).catch(function onError(error) {
                    console.log("error => ", error);
                });
            }

        }
    </script>

    <!-- <script type="application/javascript" src="{HOST}/merchantpgpui/checkoutjs/merchants/{MID}.js" onload="onScriptLoad();" crossorigin="anonymous"></script> -->
    <!-- <script>
        function onScriptLoad() {
            var config = {
                "root": "",
                "flow": "DEFAULT",
                "data": {
                    "orderId": "",
                    /* update order id */
                    "token": "",
                    /* update token value */
                    "tokenType": "TXN_TOKEN",
                    "amount": "" /* update amount */
                },
                "handler": {
                    "notifyMerchant": function(eventName, data) {
                        console.log("notifyMerchant handler function called");
                        console.log("eventName => ", eventName);
                        console.log("data => ", data);
                    }
                }
            };
            if (window.Paytm && window.Paytm.CheckoutJS) {
                window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                    // initialze configuration using init method
                    window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                        // after successfully updating configuration, invoke JS Checkout
                        window.Paytm.CheckoutJS.invoke();
                    }).catch(function onError(error) {
                        console.log("error => ", error);
                    });
                });
            }
        }
    </script> -->
</body>

</html>