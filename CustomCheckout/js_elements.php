<?php
require_once("settings.php");

$TOKEN = $_POST["TOKEN"];
$amt = $_POST["AMT"];
$orderId = $_POST["orderId"];

?>
<html>

<head>
    <title>JS ELements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="application/javascript" crossorigin="anonymous"
        src="<?php echo ENV; ?>/merchantpgpui/checkoutjs/merchants/<?php echo MID; ?>.js"></script>
</head>

<body>
    <div class="container text-center">
        <div class="shadow p-3 mb-5 bg-white rounded">

            <div class="btn-area">
                <button type="button" id="blinkCheckoutPayment" name="submit" class="btn btn-primary">Pay Now</button>
            </div>
        </div>
    </div>
    <div id="blink-response">
    </div>
    <div style="width: 50%;margin-left: 24%;text-align: center;">
        <div id="paynow">paynow div</div>
        <div id="card" style="border: 2px solid black;">card div</div>
        <br />
        <div id="upi" style="border: 2px solid black;">upi div</div>
        <br />
        <div id="ppi" style="border: 2px solid black;">PPI div</div>
        <br />
        <div id="nb" style="border: 2px solid black;">NB div</div>
        <br />
        <div id="qr" style="border: 2px solid black;">QR div</div>
        <br />
        <div id="emi" style="border: 2px solid black;">EMI div</div>
        </br>
        </br>
    </div>

    <script>
    document.getElementById("blinkCheckoutPayment").addEventListener("click", function() {
        openBlinkCheckoutPopup('<?php echo $orderId ?>', '<?php echo $TOKEN ?>',
            '<?php echo $amt ?>');
    });

    function openBlinkCheckoutPopup(orderId, txnToken, amount) {
        //Check if CheckoutJS is available
        if (window.Paytm && window.Paytm.CheckoutJS) {
            console.log('m here if');
            //Add callback function to CheckoutJS onLoad function
            // window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() { 
            //Config
            console.log('m here config');
            var config = {
                flow: "DEFAULT",
                hidePaymodeLabel: true,
                data: {
                    orderId: orderId,
                    amount: amount,
                    token: txnToken,
                    tokenType: "TXN_TOKEN"
                },
                "merchant": {
                    // redirect: false,
                    mid: "<?php echo MID ?>"
                },
                /* jselementPaymode:
			 {
				'UPI':'#UPI',
				'card':'#card'
			 } */
                handler: {
                    notifyMerchant: function(eventType, data) {
                        console.log("notify merchant called", eventType, data);
                    },

                    transactionStatus: function(data) {
                        console.log("payment status ", data);
                        window.Paytm.CheckoutJS.close();
                        var result = "<h2>Response: </h2><table>";
                        for (var key in data) {
                            if (data.hasOwnProperty(key)) {
                                result += "<tr><td>" + key + "</td><td>" + data[key] + "</td></tr>";
                            }
                        }
                        result += "</table>";
                        console.log(result);
                        document.getElementById("blink-response").innerHTML = result;
                    }
                },
            };
            console.log(window.Paytm.CheckoutJS.ELEMENT_PAYMODE);
            //Create elements instance
            var elements = window.Paytm.CheckoutJS.elements(config);

            //Create card element
            var cardElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.CARD, {
                root: "#card",
                style: {}
            });
            var Elementupi = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.UPI, {
                root: "#upi",
                style: {}
            });
            var jsElementPpi = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.PAY_WITH_PAYTM, {
                root: "#ppi",
                style: {}
            });
            var jsElementNb = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.NB, {
                root: "#nb",
                style: {}
            });
            var qrElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.SCAN_AND_PAY, {
                root: "#qr",
                style: {}
            });
            var EMIElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.EMI, {
                root: "#emi",
                style: {}
            });


            //Render element
            cardElement.invoke();
            Elementupi.invoke();
            jsElementPpi.invoke();
            jsElementNb.invoke();
            qrElement.invoke();
            EMIElement.invoke();
            console.log('paymode loaded');
            // }); 

        }
    }
    </script>

</body>

</html>