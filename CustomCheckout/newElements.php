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
            <label for="Elements">Choose a Elements:</label>
            <select id="paymode" name="paymode">
                <option value="card">Card</option>
                <option value="upi">UPI</option>
                <option value="wallet">Wallet</option>
                <option value="qr">QR</option>
                <option value="NB">NB</option>
                <option value="emi">EMI</option>
            </select>
            <div class="btn-area">
                <button type="button" id="blinkCheckoutPayment" name="submit" class="btn btn-primary">Open
                    Element</button><br><br>
                <button type="button" id="close" name="submit" class="btn btn-primary">Close
                    Element</button>
            </div>
        </div>
    </div>
    <div id="blink-response" style="width: 50%;margin-left: 24%;text-align: center;">
    </div>
    <div style="max-width: 40%;min-width:430px;text-align: center;">
        <!-- <div style="display:inline-block;position:fixed;top:40%;bottom:0;left:0;right:0;min-width:430px;margin:auto;"> -->

        <div id="paynow">paynow div</div>
        <div id="element" style="border: 1px solid black;" onClick="refreshPage()"></div>
        <br />
        </br>
    </div>

    <script>
    document.getElementById("close").addEventListener("click", function updateDiv() {
        window.location.reload();
        console.log("close");
    });
    document.getElementById("blinkCheckoutPayment").addEventListener("click", function() {
        openBlinkCheckoutPopup('<?php echo $orderId ?>', '<?php echo $TOKEN ?>',
            '<?php echo $amt ?>');
    });
    console.log("outside openBlinkCheckoutPopup");
    // console.log(value);

    function openBlinkCheckoutPopup(orderId, txnToken, amount) {
        //Check if CheckoutJS is available
        if (window.Paytm && window.Paytm.CheckoutJS) {
            //Add callback function to CheckoutJS onLoad function
            // window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() { 
            //Config
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
                    redirect: true,
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
            var select = document.getElementById('paymode');
            var value = select.options[select.selectedIndex].value;
            element(value);

            function element(ele) {
                var elements = window.Paytm.CheckoutJS.elements(config);

                console.log(ele);
                if (ele == "card") {
                    var cardElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.CARD, {
                        root: "#element",
                        style: {}
                    });
                    cardElement.invoke();
                }
                if (ele == "upi") {
                    var Elementupi = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.UPI, {
                        root: "#element",
                        style: {}
                    });
                    Elementupi.invoke();
                }
                if (ele == "wallet") {
                    var jsElementPpi = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.PAY_WITH_PAYTM, {
                        root: "#element",
                        style: {}
                    });
                    jsElementPpi.invoke();
                }
                if (ele == "qr") {
                    var jsElementQr = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.SCAN_AND_PAY, {
                        root: "#element",
                        style: {}
                    });
                    jsElementQr.invoke();
                }
                if (ele == "NB") {
                    var nbElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.NB, {
                        root: "#element",
                        style: {}
                    });
                    nbElement.invoke();
                }
                if (ele == "emi") {
                    var EMIElement = elements.createElement(window.Paytm.CheckoutJS.ELEMENT_PAYMODE.EMI, {
                        root: "#element",
                        style: {}
                    });
                    EMIElement.invoke();
                }
            }

            // }); 

        }
    }
    </script>

</body>

</html>