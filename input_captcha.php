<?php
?>

<html>
<head>
<script src="js/jquery.min.js?v=1"></script>
<script>

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
function refreshCaptcha() {
    var randomInt = getRandomInt(1,20);
    document.getElementById("img").src = "captchas/" + randomInt + ".jpg";
    document.getElementById("captcha_id").value = randomInt;
}
function checkCaptcha(user_value ,current_captcha_id ) {
		
	
	switch(current_captcha_id.toString()) {
        case "1":
			if (user_value == "71777"){ return true; }
			 break;
        case "2":
			if (user_value == "16263"){ return true; }
			 break;
        case "3":
			if (user_value == "43394"){ return true; }
			 break;
        case "4":
            if (user_value == "82143"){ return true; }
            break;
        case "5":
			if (user_value == "13630"){ return true; }
			break;
        case "6":
			if (user_value == "35364"){ return true; }
			 break;
        case "7":
			if (user_value == "79089"){ return true; }
			 break;
        case "8":
            if (user_value == "31947"){ return true; }
            break;
		case "9":
            if (user_value == "94164"){ return true; }
            break;
		case "10":
			if (user_value == "64135"){ return true; }
			break;
		case "11":
            if (user_value == "96826"){ return true; }
            break;
		case "12":
            if (user_value == "60831"){ return true; }
            break;
		case "13":
            if (user_value == "93810"){ return true; }
            break;
		case "14":
            if (user_value == "99966"){ return true; }
            break;
		case "15":
            if (user_value == "81495"){ return true; }
            break;
		case "16":
            if (user_value == "25626"){ return true; }
            break;
		case "17":
            if (user_value == "56728"){ return true; }
            break;
		case "18":
            if (user_value == "05387"){ return true; }
            break;
		case "19":
            if (user_value == "59703"){ return true; }
            break;
		case "20":
            if (user_value == "04928"){ return true; }
            break;
        default:
            break;
    }
    
}

function checkAndParseResponse(){
var user_value = document.getElementById("captcha_code_filled_by_user").value;
	var current_captcha_id = document.getElementById("captcha_id").value.toString();
	alert(checkCaptcha(user_value , current_captcha_id));
}


</script>

</head>
<body>

<input type="hidden" name="captcha_id" id="captcha_id" value="" />
<input type="button" name="btnRefresh" id="btnRefresh" value="Refresh" onclick="refreshCaptcha()" />
<img src="" id="img" name="img" style="border:2px #000;" />
<br/>
<input type="text" name="captcha_code_filled_by_user" id="captcha_code_filled_by_user" hint="Enter captcha" />
<input type="button" name="check_captcha" id="check_captcha" value="Check Captcha" onclick="checkAndParseResponse()"/>
</body>
</html>