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
    <script src="https://securegw.paytm.in/merchantpgpui/appinvoke"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- <script type="application/javascript" crossorigin="anonymous" src="<?php echo ENV ?>/merchantpgpui/checkoutjs/merchants/<?php echo MID; ?>.js"></script> -->
</head>

<body style="background-color:#505050;text-align:center;">
    <div style="color:white">

        <button type="button" id="JSCheckout" name="submit" class="btn btn-primary" onclick="window.invokeApp(<?php echo MID ?>, <?php echo $orderId ?>, <?php echo $TOKEN ?>, <?php echo $amt ?>)" style="background-color:#808080;border:none;">Pay Now</button>
    </div>

    <div id="blink-response" style="color:black">
    </div>
   
</body>

</html>