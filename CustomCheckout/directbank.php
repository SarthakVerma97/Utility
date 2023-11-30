<?php

$urlss = $_POST["urls"];
$urlrr = $_POST["urlr"];
$urlcc = $_POST["urlc"];
$tokenn = $_POST["token"];
$dis = $_POST["display"];

?>

<!DOCTYPE html>

<head>
    <script src="iframe.js"></script>
    <link rel="stylesheet" href="iframe.css">
    <script>
    var otp = document.getElementById("otp");
    console.log(otp);

    function submit() {
        const xhttp = new XMLHttpRequest();
        var token = "<?php echo $tokenn ?>";
        var otp = document.getElementById("otp").value;
        xhttp.onload = function() {
            document.getElementById("demo").innerHTML = this.responseText;
        }
        xhttp.open("POST", "<?php echo $urlss ?>");
        xhttp.setRequestHeader("Content-type", "application/json;charset=UTF-8");
        xhttp.send("txnToken= <?php echo $tokenn ?>&requestType=submit&otp=" + otp);
    }

    function resend() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("demo").innerHTML = this.responseText;
        }
        xhttp.open("POST", "<?php echo $urlrr ?>");
        xhttp.setRequestHeader("Content-type", "application/json;charset=UTF-8");
        xhttp.send("txnToken=<?php echo $tokenn ?>&requestType=resend");
    }

    function cancel() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("demo").innerHTML = this.responseText;
        }
        xhttp.open("POST", "<?php echo $urlcc ?>");
        xhttp.setRequestHeader("Content-type", "application/json;charset=UTF-8");
        xhttp.send("txnToken=<?php echo $tokenn ?>&requestType=cancel");
    }
    </script>
</head>
<html>

<body style="background-color:#999999;">

    OTP: <input type="text" name="otp" id="otp"><br>
    <input type="button" value="Submit" id="submit" onclick="submit()">
    <input type="button" value="resend" id="resend" onclick="resend()">
    <input type="button" value="cancel" id="cancel" onclick="cancel()">

    <div id="demo">
    </div>
</body>

</html>