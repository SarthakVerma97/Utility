<?php
require_once("settings.php");

$TOKEN                     = $_POST["TOKEN"];
$orderId = $_POST["orderId"];

?>
<html>

<head>
    <title>Standard Checkout</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script>
    async function copyForm() {
        // Clipboard API supported?
        if (!navigator.clipboard) return;
        var value = document.getElementById("formPost").innerHTML;
        // textContent = value.innerHTML;

        console.log(textContent);
        // copy text to clipboard
        if (navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(value);
        }

        // get text from clipboard
        if (navigator.clipboard.readText) {
            const text = await navigator.clipboard.readText();
            // console.log(text);
        }
    }
    </script> -->

</head>

<body>
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <!-- <button onclick="copyForm()">copy request</button> -->
    <!-- <div id="formPost> -->
    <form method="post"
        action="<?php echo ENV ?>/theia/api/v1/showPaymentPage?mid=<?php echo MID ?>&orderId=<?php echo $orderId ?>"
        name="f1" id="submitt2" target="my-iframe">
        <input type="hidden" name="mid" value="<?php echo MID ?>">
        <input type="hidden" name="orderId" value="<?php echo $orderId ?>">
        <input type="hidden" name="txnToken" value="<?php echo $TOKEN ?>">
        <button id="post">Submit</button>
    </form>
    <!-- <?php
            // $action = "<?php echo ENV 
            ?>/theia/api/v1/showPaymentPage?mid=<?php echo MID ?>&orderId=<?php echo $orderId ?>";
            // $mid = MID;
            // $form = " <form method=\"post\" action= {$url} target=\"my-iframe\"> <input type=\"hidden\" name=\"mid\" value=\" {$mid} \">
        <input type=\"hidden\" name=\"orderId\" value=\" {$orderId} \">
        <input type=\"hidden\" name=\"txnToken\" value=\" {$TOKEN} \">
        <button id=\"post\">Submit</button>
    </form>"; ?> -->
    <!-- </div> -->
    <button id="close">Close</button> <button id="show-again" style="display:none">show Again</button>

    <script type="text/javascript">
    document.getElementById("close").addEventListener("click", function() {
        document.getElementById("show-again").style.display = "block";
        document.getElementById("iframeHolder").style.display = "none";
        document.getElementById("post").style.display = "none";
    });
    document.getElementById("show-again").addEventListener("click", function() {
        // document.getElementById("show-again").style.display = "block";
        document.getElementById("iframeHolder").style.display = "block";
    });

    $(function() {
        $('#post').click(function() {
            if (!$('#frame').length) {
                $('#iframeHolder').html(
                    '<iframe name="my-iframe" src="<?php echo ENV ?>/theia/api/v1/showPaymentPage?mid=<?php echo MID ?>&orderId=<?php echo $orderId ?>" style="height:100%;width:60%;position:absolute;top:20%;left:20%;margin-top:-50px;margin-left:-50px;border:none;display:block;" scrolling="yes" id="frame"></iframe>'
                );
            }
        });
    });
    </script>
    <div id="iframeHolder"></div>
</body>

</html>