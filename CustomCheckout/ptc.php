<?php
require_once("settings.php");
$TOKEN           = $_POST["TOKEN"];
$orderId = $_POST["orderId"];
?>
<html>

<head>
    <title>Process transaction</title>

</head>

<body>

    <fieldset>
        <table>
            <legend>Process transaction API</legend>
            <div id="process">

                <tr>
                    <input type="radio" id="nb" name="ptc" value="nb" checked /> Net Banking
                    <select name="NBChannel" id="NBChannel">
                        <option value="AIRP"> AIRP: AIRTEL PAYMENTS BANK</option>
                        <option value="AUBL"> AUBL: AU Small Finance Bank</option>
                        <option value="AXIS"> AXIS: Axis Bank</option>
                        <option value="BBK"> BBK: Bank of Bahrain and Kuwait</option>
                        <option value="BBL"> BBL: Bandhan Bank</option>
                        <option value="BHARAT"> BHARAT: Bharat Bank</option>
                        <option value="BOB"> BOB: Bank of Baroda</option>
                        <option value="BOI"> BOI: Bank of India</option>
                        <option value="BOM"> BOM: Bank of Maharashtra</option>
                        <option value="CANARA"> CANARA: Canara Bank</option>
                        <option value="CBI"> CBI: Central Bank of India</option>
                        <option value="CITIUB"> CITIUB: City Union Bank</option>
                        <option value="COSMOS"> COSMOS: Cosmos Bank</option>
                        <option value="CSB"> CSB: CSB Bank</option>
                        <option value="DCB"> DCB: DCB Bank</option>
                        <option value="DEUTS"> DEUTS: Deutsche Bank</option>
                        <option value="DHAN"> DHAN: Dhanlaxmi Bank</option>
                        <option value="ESFB"> ESFB: Equitas Bank</option>
                        <option value="FDEB"> FDEB: Federal Bank</option>
                        <option value="GPPB"> GPPB: Gopinath Patil Parsik Janata Sahakari Bank Ltd.</option>
                        <option value="HDFC"> HDFC: HDFC Bank</option>
                        <option value="ICICI"> ICICI: ICICI Bank</option>
                        <option value="IDBI"> IDBI: IDBI Bank</option>
                        <option value="IDFC"> IDFC: IDFC FIRST Bank</option>
                        <option value="INDB"> INDB: Indian Bank</option>
                        <option value="INDS"> INDS: IndusInd Bank</option>
                        <option value="IOB"> IOB: Indian Overseas Bank</option>
                        <option value="JKB"> JKB: Jammu and Kashmir Bank</option>
                        <option value="JSB"> JSB: Janata Sahakari Bank</option>
                        <option value="KTKB"> KTKB: Karnataka Bank</option>
                        <option value="KVB"> KVB: Karur Vysya Bank</option>
                        <option value="LVB"> LVB: Lakshmi Vilas Bank</option>
                        <option value="NKGS"> NKGS: NKGSB BANK</option>
                        <option value="NKMB"> NKMB: Kotak Bank</option>
                        <option value="PNB"> PNB: Punjab National Bank</option>
                        <option value="PNBCORP"> PNBCORP: PNB Corporate</option>
                        <option value="PSB"> PSB: Punjab and Sind Bank</option>
                        <option value="PYTM"> PYTM: Paytm Payments Bank</option>
                        <option value="RATN"> RATN: RBL Bank</option>
                        <option value="RBS"> RBS: Royal Bank of Scotland</option>
                        <option value="SBI"> SBI: State Bank of India</option>
                        <option value="SCB"> SCB: Standard Chartered Bank</option>
                        <option value="SIB"> SIB: South Indian Bank</option>
                        <option value="SSFB"> SSFB: Suryoday Small Finance Bank</option>
                        <option value="STB"> STB: Saraswat Cooperative Bank</option>
                        <option value="SVC"> SVC: SVC Cooperative Bank Ltd</option>
                        <option value="TNMB"> TNMB: Tamilnad Mercantile Bank</option>
                        <option value="UBICORPORATE"> UBICORPORATE: Union Bank of India Corporate</option>
                        <option value="UCO"> UCO: UCO Bank</option>
                        <option value="UNI"> UNI: Union Bank of India</option>
                        <option value="USFB"> USFB: Ujjivan Small Finance Bank</option>
                        <option value="YES"> YES: Yes Bank</option>
                    </select>
                </tr>
                <tr>
                    <input type="radio" id="wallet" name="ptc" value="wallet" />Wallet
                </tr>
                <tr>
                    <input type="radio" id="collect" name="ptc" value="collect" />UPI Collect
                </tr>
                <tr>
                    <input type="radio" id="intent" name="ptc" value="intent" />UPI INTENT
                </tr>
                <tr>
                    <input type="radio" id="cards" name="ptc" value="cards" />Cards
                </tr>
            </div>
        </table>
    </fieldset>
    <form method="post" action="Process.php" name="f1" id="submitt2" target="_blank">
        <input type="hidden" name="orderId" value="<?php echo $orderId ?>">
        <input type="hidden" name="txnToken" value="<?php echo $TOKEN ?>">
        <input type="hidden" name="channel" value="NBChannel">
        <input type="hidden" name="paymode" value="NET_BANKING">
        <!-- <input type="hidden" name="paymodeInfo" value="<?php echo $TOKEN ?>"> -->

        <button id="post">Submit</button>

    </form>


</body>

</html>