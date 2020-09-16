<?php

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
$protocol = $_SERVER['SERVER_PROTOCOL'];
if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0' ) ) ) {
$protocol = 'HTTP/1.0';
}

header( 'Allow: POST' );
header( "$protocol 405 Method Not Allowed" );
header( 'Content-Type: text/plain' );
exit;
}

function bank_information($cardn){
    $cardn = (integer)$cardn;
    if ($cardn == 603799 || $cardn == 170019 || $cardn == 589905) {
      $bankname = "MELI";  
      $bankinfo = "
🌐 Website : bale.apk
📱 Ussd : *717#  
☎️ TBank : 09622
";
      }elseif ($cardn == 589210) {
        $bankname = "SEPAH";
        $bankinfo = "
🌐 Website : https://ib.ebanksepah.ir/desktop/sepahPages/shetabCard.sepah
☎️ TBank : 021 64058
";
      }elseif ($cardn == 627648 || $cardn == 207177) {
        $bankname = "TOSEE SADERAT";
        $bankinfo = "
☎️ TBank : 021 2722
";
      }elseif ($cardn == 627961) {
        $bankname = "SANAT MADAN";
        $bankinfo = "
📱 Ussd : *719#
☎️ TBank : 021 75024
";
      }elseif ($cardn == 603770 || $cardn == 639217) {
        $bankname = "KESHAVARZI";
        $bankinfo = "
🌐 Website : https://ib.bki.ir/pid46.lmx
📱 Ussd : *730#
☎️ TBank : 09603
";
      }elseif ($cardn == 628023) {
        $bankname = "MASKAN";
        $bankinfo = "
📱 Ussd : *714#, *737#
☎️ TBank : 021 64096
";
      }elseif ($cardn == 627760) {
        $bankname = "POSTBANK";
        $bankinfo = "
📱 Ussd : *747#
☎️ TBank : 021 84284
";
      }elseif ($cardn == 502908) {
        $bankname = "TOSEE TAAVON";
        $bankinfo = "
🌐 Website : https://epayment.ttbank.ir
";
      }elseif ($cardn == 627412) {
        $bankname = "EGHTESAD NOVIN";
        $bankinfo = "
🌐 Website : https://modern.enbank.net/CustomerManager/viewLogin.html
☎️ TBank : 021 85292
";
      }elseif ($cardn == 622106 || $cardn == 639194 || $cardn == 627884) {
        $bankname = "PARSIAN";
        $bankinfo = "
📱 Ussd : *708#
☎️ TBank : 021 89111
";
      }elseif ($cardn == 502229 || $cardn == 639347) {
        $bankname = "PASARGAD";
        $bankinfo = "
🌐 Website : https://epay.bpi.ir/balanceinquiry.aspx
📱 Ussd : *720#
☎️ TBank : 021 828991111
";
      }elseif ($cardn == 627488 || $cardn == 502910) {
        $bankname = "KARAFARIN";
        $bankinfo = "
☎️ TBank : 021 23640
";
      }elseif ($cardn == 621986) {
        $bankname = "SAMAN";
        $bankinfo = "
📱 Ussd : *724#
☎️ TBank : 021 6422
";
      }elseif ($cardn == 639346) {
        $bankname = "SINA";
        $bankinfo = "
🌐 Website : https://sina24h.com/CustomerService2/viewLogin.html
📱 Ussd : *727#
☎️ TBank : 021 82487
";
      }elseif ($cardn == 639607) {
        $bankname = "SARMAYE";
        $bankinfo = "
🌐 Website : https://pg.sbank.ir/balanceRequest.do
☎️ TBank : 021 8254
";
      }elseif ($cardn == 636214) {
        $bankname = "AYANDE";
        $bankinfo = "
📱 Ussd : *745#
☎️ TBank : 021 2957
";
      }elseif ($cardn == 502806 || $cardn == 504706) {
        $bankname = "SHAHR";
        $bankinfo = "
🌐 Website : https://ebank.city-bank.net/customermanager/viewLogin.html
📱 Ussd : *787#
☎️ TBank : 021 87611
";
      }elseif ($cardn == 502938) {
        $bankname = "DAY";
        $bankinfo = "
☎️ TBank : 021 2726
";
      }elseif ($cardn == 603769) {
        $bankname = "SADERAT";
        $bankinfo = "
📱 Ussd : *719#
☎️ TBank : 09602
";
      }elseif ($cardn == 610433 || $cardn == 991975) {
        $bankname = "MELLAT";
        $bankinfo = "
📱 Ussd : *720#
☎️ TBank : 021 8132
";
      }elseif ($cardn == 585983) {
        $bankname = "TEJARAT";
        $bankinfo = "
🌐 Website : https://pg.tejaratbank.ir/paymentGateway/getBalance
☎️ TBank : 021 81277
";
      }elseif ($cardn == 589463) {
        $bankname = "REFAH";
        $bankinfo = "
📱 Ussd : *729#
☎️ TBank : 021 84043000
";
      }elseif ($cardn == 627381) {
        $bankname = "ANSAR";
        $bankinfo = "
🌐 Website : https://ebank.ansarbank.com/customermanager/viewLogin.html
📱 Ussd : *763#
☎️ TBank : 021 48049
";
      }elseif ($cardn == 505785) {
        $bankname = "IRAN ZAMIN";
        $bankinfo = "
☎️ TBank : 021 24760
";
      }elseif ($cardn == 636795) {
        $bankname = "MARKAZI";
        $bankinfo = "
📜 No Info!
";
      }elseif ($cardn == 636949) {
        $bankname = "HEKMAT";
        $bankinfo = "
☎️ TBank : 021 89555
";
      }elseif ($cardn == 505416) {
        $bankname = "GARDESHGARI";
        $bankinfo = "
🌐 Website : https://epayment.tourism-bank.com/BalanceInquiry.aspx
📱 Ussd : *764#
☎️ TBank : 021 22630345
";
      }elseif ($cardn == 606373) {
        $bankname = "QARZOLHASANE";
        $bankinfo = "
🌐 Website : https://epayment.rqb.ir/BalanceInquiry.aspx
☎️ TBank : 021 8528
";
      }elseif ($cardn == 628157) {
        $bankname = "MOESSE TOSEE";
        $bankinfo = "
☎️ TBank : 021 81461
";
      }elseif ($cardn == 505801) {
        $bankname = "KOSAR";
        $bankinfo = "
📱 Ussd : *744#
☎️ TBank : 021 86777
";
      }elseif ($cardn == 639370) {
        $bankname = "MOSSE MEHR";
        $bankinfo = "
🌐 Website : https://modern.qmbi24.com/customermngr/viewLogin.html
☎️ TBank : 021 8989
";
      }elseif ($cardn == 639599) { 
        $bankname = "QAVAMIN";
        $bankinfo = "
☎️ TBank : 021 84270
";
      }else{
        $bankname = "#FAKE";
        $bankinfo = "
		CARDFAKE";
    
      }
      return array($bankinfo,$bankname);
}

?>