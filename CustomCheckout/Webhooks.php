<?php
require_once("./settings.php");


$paramList = array();
$paramList = $_POST;
$response = json_encode($paramList, JSON_UNESCAPED_SLASHES);

$sdate = "Date/Time: " . date("Y-m-d h:i:s a");
$filename = 'C:\xampp\htdocs\Test\CustomCheckout\logs.txt';
if (is_writable($filename)) {

    $myfile = fopen($filename, "a") or die("Unable to open file!");
    fwrite($myfile, "\n\n ");
    fwrite($myfile, "Webhook Response");
    fwrite($myfile, "/---------------------------------------------/\n");
    fwrite($myfile, $sdate);
    fwrite($myfile, "  ");
    fwrite($myfile, "Response ");
    fwrite($myfile, $response);
    fwrite($myfile, "\n");
    echo "\n";
    echo " logged successfuly";

    fclose($myfile);
} else {
    echo "The file $filename is not writable";
}