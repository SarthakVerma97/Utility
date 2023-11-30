<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);
require_once("./settings.php");
function random_strings($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOabcdefghijklmnPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, $length_of_string);
}
$ref = random_strings(10);
$refid = "Ref_" . $ref;
$paytmParams = array();

$paytmParams["body"] = array(
    "mobileNo"     => "8356851746",
    "mid"    => MID,
    "paymentMode" =>    array("PAYTM_DIGITAL_CREDIT")
);
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), MKEY);

$paytmParams["head"] = array(

    "channelId"    => "WEB",
    "version" => "v1",
    "tokenType" => "CHECKSUM",
    "token"     => $checksum
    // "token"     => "eyJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiZGlyIn0..lE-u5bHWySQOoh9z.X0TYpgxlg4okNu6pIX3PBaiV1HlkWRun6OGfv_rQudGz2cWHcZkMielLUxY2MgzD8quzZZPgXFA6ysEsBbHX5oI62K7yMUknlQIafFzqR-7bTbUIB-kbjkuRNKLF33cIzQda36qfge9pOeGLbgFQfZWxuR7YDij1ED5HI1gp3mOAldQq-IDxSUsnvVvYo-GJYihSG6Y_6flOEHYl0c9VQiZNxCMA_2HG1UtsuyhyUVm-DpSQwNVv.CsQZioXJzqm1HlHGtSYsrQ3000"
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);


$url = ENV . "/theia/api/v1/fetchUserPaymentModeStatus";

$res = hit_API($url, $post_data);

?>
<html>

<body>

    <fieldset>
        <legend>Request:</legend>
        <?php printt($post_data) ?>
    </fieldset>
    <fieldset>
        <legend>Response:</legend>
        <?php printt($res) ?>
    </fieldset>
</body>

</html>