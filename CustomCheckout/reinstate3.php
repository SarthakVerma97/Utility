<?php
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("PaytmChecksum.php");
$order_id= "fkp_".time();
$custId ="custfkp_".time();
$amount = "1500";
$paytmParams = array();


$mid = "Flipka84695711788992";
$key = "6D6uKwp5ZY&xjuIj";
$paytmParams["body"] = array(
    "mid"           => $mid,
    "orderId"   => "PZT2109162110ADQX801",
    "reinstateRefId"       => "fkp_".time(),
    "revokeAmount"   => "10",
    "autoOfferRevoke" => "true",
    // "offerRevoke" => false,
    
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $key);

$paytmParams["head"] = array(
    "signature"    => $checksum,
    "clientId" => "C11",

);
/* echo"<pre>";
print_r($paytmParams);
echo "</pre>"; */
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
echo $post_data."<br /><br />";
/* for Staging */
$url = "https://securegw.paytm.in/refund/api/v1/promo/reinstate/process";
echo $url."<br />";
/* for Production */
// $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=ORDERID_98765";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
$result= json_decode($response,true);
echo"<pre>";
print_r($response);
echo "</pre>";
?>