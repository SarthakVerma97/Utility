<?php
require_once("settings.php");
require_once("encdec_paytm.php");
$paramList = array();



$paramList["REQUEST_TYPE"] = "DEFAULT";
$paramList["INDUSTRY_TYPE_ID"] = "Retail";
// $paramList["AUTH_MODE"] = "3D";
$paramList["ORDER_ID"] = orderId;
$paramList["CUST_ID"] = "1790028";
$paramList["CHANNEL_ID"] = "WAP";
// $paramList["PAYMENT_TYPE_ID"] = "PPI,UPI";
// $paramList["PAYMENT_MODE_ONLY"] = "YES";
// $paramList["SSO_TOKEN"] = "eyJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiZGlyIn0..RptzpwEbTHy6gMnZ.0ieX7pMZ7EZstDNI8_qbERwkKAOntKmL3CSfs3DzaIvDKTNW0PuTRuxDrA4jlm6n8frgHjoj8wqKQsvhabO2XBzq4hV64EYV1lGRLwwbqCUtzmKamlqyqgGLn4-pex1D09xtWa3POFvMhJb5SoPUfgeQ2AKKTM82KYZUqZ9U-F3T9o263Wk0hRVnXNbwCY7Bq9gPZ_R1j1MBIQjAHUc3SnPqIbl27W2XtadhvXBtM89KdBFWdYU1.v5j9FJsUIZEpS3AovMjpDA6000";
// $paramList["BANK_CODE"] = "ANDHRA";
// $paramList["PAYMENT_DETAILS"] = "kzh9P7xdXkDzanh7xzWHEcHMwSUjWZNxvmF94LnAcmQ=";
$paramList["MID"] = MID;
$paramList["WEBSITE"] = "IRCTCET";
$paramList["TXN_AMOUNT"] = "90000.00";
// $paramList["MOBILE_NO"] = "8888888888";
$paramList["CALLBACK_URL"] = "http://localhost/Test/CustomCheckout/pgResponse.php";
// $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
// $paramList["EMAIL"] = "dfsdfds@fdfd.com"; //Email ID of customer
// $paramList["VERIFIED_BY"] = "EMAIL"; //
// $paramList["IS_USER_VERIFIED"] = "YES"; //
// $paramList["validateAccountNumber"] = "false";
// $paramList["accountNumber"] = "917405329843";
// $paramList["splitSettlementInfo"] = "{\"splitMethod\":\"AMOUNT\",\"splitInfo\":[{\"mid\":\"Vimala66001130194546\",\"amount\":\"1\"},{\"mid\":\"Vimala24079653761158\",\"amount\":\"1\"}]}";

// $paramList["CHECKSUMHASH"] = getChecksumFromArray($paramList, MKEY);
$checksum = PaytmChecksum::generateSignature($paramList, MKEY);

$paramList["CHECKSUMHASH"] = $checksum;


$url = ENV . "/order/process";
// $url = ENV . "/theia/processTransaction";


?>
<html>

<head>
    <title>Redirection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <center>
        <h1>Copy the request parameters if you want to</h1>
    </center>
    <form method="post" action="<?php echo $url ?>" name="f1" id="submitt">
        <?php
        foreach ($paramList as $paramName => $paramValue) {
            echo "<br/>" . $paramName . " = " . $paramValue;
        }
        // echo '<br/>CHECKSUMHASH  =   ' . $checkSum;
        ?>
        <br><br>
        <button type="submit" form="submitt" value="Submit">Submit</button>
        <table border="1">
            <tbody>
                <?php
                foreach ($paramList as $name => $value) {
                    echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
                }
                ?>
                <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
            </tbody>
        </table>
    </form>
</body>

</html>
<?php
// json_encode($paytmParams);
// $req = json_decode(json_encode($paramList), true);
// $sdate = "Date/Time: " . date("Y-m-d h:i:s a");
// $filename = 'C:\xampp\htdocs\Test\CustomCheckout\logs.txt';
// if (is_writable($filename)) {

//     $myfile = fopen($filename, "a") or die("Unable to open file!");
//     fwrite($myfile, "\n\n ");
//     fwrite($myfile, "Redirection flow: ");
//     fwrite($myfile, "/---------------------------------------------/\n");
//     fwrite($myfile, $sdate);
//     fwrite($myfile, "  ");
//     fwrite($myfile, "MID: ");
//     fwrite($myfile, $mid);
//     fwrite($myfile, " & orderId: ");
//     fwrite($myfile, $orderid);
//     fwrite($myfile, "\n");
//     fwrite($myfile, "URL: ");
//     fwrite($myfile, $url);
//     fwrite($myfile, "\n");
//     fwrite($myfile, "--> Request: ");
//     fwrite($myfile, $req);
//     fwrite($myfile, "\n");

//     echo "logged successfuly";

//     fclose($myfile);
// } else {
//     echo "The file $filename is not writable";
// }

?>