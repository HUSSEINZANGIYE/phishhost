<?php
/*
کانال شهر سورس مرجع انواع سورس کد های مختلف
بانک انواع سورس کد های مختلف به صورت کاملا تست شده
هر روز کلی سورس کد و اسکریپت منتظر شماست !

@ShahreSource
https://t.me/ShahreSource
*/
ob_start();
include('token.php');
include('jdf.php');
//-------------------------------------------//
define('API_KEY', $API_KEY);
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$Botid = $GetINFObot->result->username;
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

//-------------------------------------------//

function SendDocument($chatid,$document,$caption = null){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption
	]);
}
function CreateZip($files = array(),$destination) {
    if(file_exists($destination)){
		return false;
	}
    $valid_files = array();
    if(is_array($files)){
        foreach($files as $file){
            if(file_exists($file)){
                $valid_files[] = $file;
            }
        }
    }
    if(count($valid_files)){
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true){
            return false;
        }
        foreach($valid_files as $file){
            $zip->addFile($file,$file);
        }
        $zip->close();
        return file_exists($destination);
    }else{
        return false;
    }
}
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
function sendAction($chat_id, $action){
    bot('sendChataction',[
        'chat_id'=>$chat_id,
        'action'=>$action
    ]);
}
function sendphoto($ChatId, $photo_id,$caption){
    bot('sendphoto',[
        'chat_id'=>$ChatId,
        'photo'=>$photo_id,
        'caption'=>$caption
    ]);
}
function sendvideo($chat_id,$video_id,$caption){
    bot('sendvideo',[
        'chat_id'=>$chat_id,
        'video'=>$video_id,
        'caption'=>$caption
    ]);
}
function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard){
bot('editMessagetext', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => $text,
'parse_mode' => $parse_mode,
'disable_web_page_preview' => $disable_web_page_preview,
'reply_markup' => $keyboard
]);
}
function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $keyboard){
bot('sendMessage', [
'chat_id' => $chatid,
'text' => $text,
'parse_mode' => $parsmde,
'disable_web_page_preview' => $disable_web_page_preview,
'reply_markup' => $keyboard
]);
}
//-------------------------------------------//
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$text = $message->text;
$textmassage = $message->text;
mkdir("data/$chat_id");
$text1 = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$message_id = $update->message->message_id;
$messageid = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->forward_from->id;
$photo = $update->message->photo;
$data = $update->callback_query->data;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$forward_from = $update->message->forward_from;
$forward_from_id = $forward_from->id;
$forward_from_username = $forward_from->username;
$fromm_id = $update->inline_query->from->id;
$fatime = jdate('H:i:s');
$fadate = jdate("Y/F/d");
$ftime = jdate("H:i:s");
$fdate = jdate("Y/F/d");
@$ShahreSource = file_get_contents("data/$chat_id/ShahreSource.txt");
//-------------------------------------------//
$left = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$channel&user_id=$from_id"))->result->status;
//-------------------------------------------//
$mtnechlsh = file_get_contents("data/mtnechlsh.txt");
$asmibrnde = file_get_contents("data/asmibrnde.txt");
//-------------------------------------------//
$command = file_get_contents("data/$from_id/command.txt");
$ubuy = file_get_contents("data/$chat_id/ubuy.txt");
$coin = file_get_contents("data/$chat_id/coin.txt");
$ref = file_get_contents("data/$chat_id/ref.txt");
$AllBuyT = file_get_contents("data/$chat_id/masrafi.txt");
$hazineh = file_get_contents("data/$chat_id/masrafi.txt");
//-------------------------------------------//
$members = file_get_contents("data/members.txt");
$memlist = explode("\n", $members);
$banlist = file_get_contents("data/banlist.txt");
$blist = explode("\n", $banlist);
//-------------------------------------------//
if ($coin < 0) {
    file_put_contents("data/$chat_id/coin.txt", "0");
}
//-------------------------------------------//
if ($left == "left") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
▫️برای فعال شدن ربات باید در کانال زیر عضو شوید 👇

🔹 $channel 

🔹 $channel

⚠️ درصورت عضو نشدن ربات فعال نمی شود ...
✅ پس از عضویت در کانال دستور /start را دوباره تکرار کنید ..
",
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "🔻ورود به کانال🔻", 'url' => "http://telegram.me/" . str_replace("@", '', $channel)]]]])
    ]);
} else {

    if (strpos($text, '/start') !== false or $text == "↪️ بازگشت") {

        if (!in_array($chat_id, $memlist)) {
            if (!file_exists("data")) {
                mkdir("data");
            }
            mkdir("data/$from_id");
            $members .= $chat_id . "\n";
            file_put_contents("data/members.txt", "$members");
            file_put_contents("data/$chat_id/zaman.txt", $fdate);
            file_put_contents("data/$chat_id/saat.txt", $ftime);
            file_put_contents("data/$chat_id/coin.txt", "0");
            file_put_contents("data/$chat_id/ubuy.txt", "0");
            file_put_contents("data/$chat_id/ref.txt", "0");
            file_put_contents("data/$chat_id/masrafi.txt", "0");

            $id = str_replace("/start ", "", $text);
            if ($id != "" && $text != "/start" && $id != $from_id) {
                SendMessage($id, "🏷 کاربر <a href='tg://user?id=$from_id'>$first_name</a> با لینک شما وارد ربات شد!

🔻50 تومان به حساب شما واریز شد ☑️
", "HTML");
                file_put_contents("data/$from_id/refe.txt", "$id");
                $refs = file_get_contents("data/$id/ref.txt");
                $refs = $refs + 1;
                file_put_contents("data/$id/ref.txt", "$refs");
                $ske = file_get_contents("data/$id/coin.txt");
                $seke = $ske + 50;
                file_put_contents("data/$id/coin.txt", "$seke");
                
            }
        }

        file_put_contents("data/$chat_id/command.txt", "none");

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻سلام به ربات هاست دهی ما خوش آمدید ..

▫️شما میتوانید با استفاده از ربات ما برای خودتان هاست خریداری یا رایگان دریافت نمایید ..

⚜ هر سوال و یا مشکلی داشتید میتوانید از طریق قسمت  | 📮تیکت و پشتیبانی ربات📮 | با ما در ارتباط باشید.
🌐 کانال ما : $channel

📅 تاریخ: $fadate
⏰ ساعت: $fatime
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🎁سرویس رایگان🎁"]], 
                    [['text' => "▪حساب کاربری▪"], ['text' => "🏆محصولات ما🏆"]],
                    [['text' => "🚘تست سرویس🚘"],['text' => "🍂دریافت هاست اسپانسری🍃"]],
                    [['text' => "🌍ورود به [سایت‌‌]🌍"],['text' => "▪ناحیه کاربری▪"]],              
                    [['text' => "📮تیکت و پشتیبانی ربات📮"], ['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                    [['text' => "🎗چالش ویژه این هفته🎗"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
 //-------------------------------------------//
 elseif ($text == "🍂دریافت هاست اسپانسری🍃") {

bot('sendMessage',[
 'chat_id'=>$chat_id,  
 'text'=>'⭕'
 ]);
 sleep(0.3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔴🔴'
 ]);
sleep(0.3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔵🔵'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'⚪️⚪️'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'⚫️⚫️'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔴🔴'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔵🔵'
 ]);
 sleep(0.3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
            'text' => "شرایط دریافت هاست اسپانسری به این صورت می باشد👇
● داشتن کانالی با موضوع برنامه نویسی ، طراحی سایت ، ربات سازی ..
● حداقل داشتن اعضا 300 نفر در کانال
● ویو روزانه حداقل 200 ویو
● ثبت بنر تبلیغاتی ما در کانال
❎ در صورت پذیرفتن تمامی شرایط ما ، به قسمت پشتیبانی مراجعه کنید ..د",
'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                ['text' => "⚙پشتیبانی⚙", 'url' => "t.me/ShahreSource"]
                    ]
                ]
            ])
        ]);
    }
//-------------------------------------------//
elseif ($text == '▪ناحیه کاربری▪') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "نوع ورود به ناحیه کاربری را از دکمه زیر  انتخاب کنید👇",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "ورود (حساب دارم)🚀"]],
                    [['text' => "🌿عضویت (حساب ندارم)"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //////
    elseif ($text == '🚘تست سرویس🚘') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔹به قسمت تست سرعت هاست خوش آمدید ..

▫️در این قسمت شما میتوانید به دو صورت ادیت متن و ارسال پیام پیاپی سرعت هاست را تست کنید ☑️
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "ارسال متن🔹"], ['text' => "🔹ادیت متن"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    } 
  //-------------------------------------------//
  elseif ($text == '🔹ادیت متن') {
    	bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
▫️ربات تا 3 ثانیه دیگر شروع به ادیت متن میکند ..

⚠️ با دقت نگاه کنید و از سرعت لذت ببرید ..
"
        ]);
        sleep(3);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️█████████ 10%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️████████ 20%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️███████ 30%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️██████ 40%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️⬛️█████ 50%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️⬛️⬛️████ 60%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️⬛️⬛️⬛️███ 70%"
        ]);
        bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️██ 80%"
        ]);
        bot('editmessagetext',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️█ 90%"
        ]);
        bot('editmessagetext',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
        'text' => "⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️ 100%"
        ]);
        bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
▫️سرعت هاست برابر با سرعت نور🚀

🔻برای تهیه همچین هاستی به سایت ما مراجعه کنید ..

📣 کانال ما : $channel
🌐 سایت ما : $webhost
🤖 ربات ما : @$Botid
"
        ]);
    }
    //-------------------------------------------//
    elseif ($text == 'ارسال متن🔹') {
    	bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
▫️ربات تا 3 ثانیه دیگر شروع به ارسال متن میکند ..

⚠️ با دقت نگاه کنید و از سرعت لذت ببرید ..
"
        ]);
        sleep(3);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "ت"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "یـ"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "م"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "س"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "و"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "ر"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "س"
        ]);
        bot('sendMessage',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
        'text' => "س"
        ]);
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
        'text' => "ر"
        ]);
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
        'text' => "چ"
        ]);
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
        'text' => "@ShahreSource"
        ]);
        bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
▫️سرعت هاست برابر با سرعت نور🚀

🔻برای تهیه همچین هاستی به سایت ما مراجعه کنید ..

📣 کانال ما : $channel
🌐 سایت ما : $webhost
🤖 ربات ما : @$Botid
"
        ]);
    }
    elseif ($text == "🌍ورود به [سایت‌‌]🌍") {

bot('sendMessage',[
 'chat_id'=>$chat_id,  
 'text'=>'⭕'
 ]);
 sleep(0.3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔴🔴'
 ]);
sleep(0.3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔵🔵'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'⚪️⚪️'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'⚫️⚫️'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔴🔴'
 ]);
 sleep(0.3);
bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'🔵🔵'
 ]);
 sleep(0.3);
 bot('EditMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
            'text' => "🌍از طریق دکمه زیر اقدام به ورود در سایت کنید",
'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                ['text' => "🌍ورود به [سایت‌‌]🌍", 'url' => "$webhost"]
                    ]
                ]
            ])
        ]);
    }
    //-------------------------------------------//
    elseif ($text == '🏆محصولات ما🏆') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🏆محصولات ما🏆

🔻تمامی قیمت ها متغیر هستند و ممکن است در طول زمان کم و زیاد شوند ✅

🔹از منو زیر جهت آگاهی از قیمت ها استفاده کنید

",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "▫️هاست▫️"]],
                    [['text' => "▫️نمایندگی▫️"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    
    elseif ($text == '▫️هاست▫️') {
        bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

🏷 فضا 1GB
📡 پهنای باند 20GB

∞ زیر دامنه و ساب دامین
∞ بقیه امکانات
✅ Let`s Encrypt
❌ دسترسی شل
✅ دسترسی به CGI
🇩🇪 کشور آلمان
♻️ بکاپ گیری  24 ساعته
🔹وب سرور لایت اسپید
🔻تحویه کننده کلاد لینوکس
📥 تحویل آنی
👤 پشتیبانی 24 ساعته
🖥 کنترل پنل cPanel

💎 قیمت ماهانه 5000 تومان💰

⌛️ لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=1

─────┅┅══┅┅─────
"
]);
sleep(1);
			bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

🏷 فضا 5GB
📡 پهنای باند 60GB

∞ زیر دامنه و ساب دامین
∞ بقیه امکانات
✅ Let`s Encrypt
❌ دسترسی شل
✅ دسترسی به CGI
🇩🇪 کشور آلمان
♻️ بکاپ گیری  24 ساعته
🔹وب سرور لایت اسپید
🔻تحویه کننده کلاد لینوکس
📥 تحویل آنی
👤 پشتیبانی 24 ساعته
🖥 کنترل پنل cPanel

💎 قیمت ماهانه 8000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=2

─────┅┅══┅┅─────
"
]);
sleep(1);
			bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

🏷 فضا 10GB
📡 پهنای باند 200GB

∞ زیر دامنه و ساب دامین
∞ بقیه امکانات
✅ Let`s Encrypt
✅ دسترسی شل
✅ دسترسی به CGI
🇩🇪 کشور آلمان
♻️ بکاپ گیری  24 ساعته
🔹وب سرور لایت اسپید
🔻تحویه کننده کلاد لینوکس
📥 تحویل آنی
👤 پشتیبانی 24 ساعته
🖥 کنترل پنل cPanel

💎 قیمت ماهانه 12000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=3

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

🏷 فضا 15GB
📡 پهنای باند 400GB

∞ زیر دامنه و ساب دامین
∞ بقیه امکانات
✅ Let`s Encrypt
✅ دسترسی شل
✅ دسترسی به CGI
🇩🇪 کشور آلمان
♻️ بکاپ گیری  24 ساعته
🔹وب سرور لایت اسپید
🔻تحویه کننده کلاد لینوکس
📥 تحویل آنی
👤 پشتیبانی 24 ساعته
🖥 کنترل پنل cPanel

💎 قیمت ماهانه 20000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=4

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

🏷 فضا 20GB
📡 پهنای باند 600GB

∞ زیر دامنه و ساب دامین
∞ بقیه امکانات
✅ Let`s Encrypt
✅ دسترسی شل
✅ دسترسی به CGI
🇩🇪 کشور آلمان
♻️ بکاپ گیری  24 ساعته
🔹وب سرور لایت اسپید
🔻تحویه کننده کلاد لینوکس
📥 تحویل آنی
👤 پشتیبانی 24 ساعته
🖥 کنترل پنل cPanel

💎 قیمت ماهانه 27000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=5

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

🔻تمامی سرویس های بالا پس از پرداخت بصورت آنی به شما تحویل داده میشود ..

🔺همچنین میتوانید با زیرمجموعه گیری  هاست مورد نظر رو خود را از ربات خریداری نمایید ..

─────┅┅══┅┅─────

📣 کانال ما : $channel
🌐 سایت ما : $webhost
"
]);
			
			}
     //-------------------------------------------//
    elseif ($text == '▫️نمایندگی▫️') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
▫️به قسمت نمایندگی خوش آمدید ..

⚠️ در صورت بروز هرگونه مشکل با کلید بر روی دکمه پشتیبانی در منو اصلی با ما ارتباط برقرار نمایید.

🔹از منو زیر جهت دیدن قیمت ها استفاده کنید
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🔖 مستر ریسلر"], ['text' => "🔖 ریسلر"]],
                    [['text' => "🔖 آلفا ریسلر"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
elseif ($text == '🔖 ریسلر') {
        bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

NM-ZETA

🗄 فضا 7 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 15 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 11000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=6

─────┅┅══┅┅─────
			"
			]);
			sleep(1);
			bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

NM-PSI

🗄 فضا 17 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 30 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 18000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=7

─────┅┅══┅┅─────
			"
			]);
			sleep(1);
			bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

NM-PHI

🗄 فضا 35 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 40 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 28000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=8

─────┅┅══┅┅─────
			"
			]);
			sleep(1);
			bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

NM-PSA

🗄 فضا 50 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 55 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 38000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=9

─────┅┅══┅┅─────
			"
			]);
			sleep(1);
			bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
			─────┅┅══┅┅─────

🔻تمامی سرویس های بالا پس از پرداخت بصورت آنی به شما تحویل داده میشود ..

─────┅┅══┅┅─────

📣 کانال ما : $channel
🌐 سایت ما : $webhost
			"
			]);
			
			}
		//-------------------------------------------//
		elseif ($text == '🔖 مستر ریسلر') {
        bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

Mr-One

🗄 فضا 25 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 کنترل پنل Cpanel/WHM
🗂 حداکثر اکانت سی پنل 35 عدد
👥 تعداد نمایندگی 6 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 23000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=10

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

Mr-Two

🗄 فضا 65 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 کنترل پنل Cpanel/WHM
🗂 حداکثر اکانت سی پنل 55 عدد
👥 تعداد نمایندگی 11 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 38000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=11

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

Mr-Three

🗄 فضا 85 گیگابایت NVME
📡 پهنای باند نامحدود
🗳 کنترل پنل Cpanel/WHM
🗂 حداکثر اکانت سی پنل 85 عدد
👥 تعداد نمایندگی 23 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP

💎 قیمت ماهانه 48000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=12

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

🔻تمامی سرویس های بالا پس از پرداخت بصورت آنی به شما تحویل داده میشود ..

─────┅┅══┅┅─────

📣 کانال ما : $channel
🌐 سایت ما : $webhost
"
]);

     }
     //-------------------------------------------//
     elseif ($text == '🔖 آلفا ریسلر') {
        bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

Alpha-One

🗄 فضا 60 گیگابایت SSD
📡 پهنای باند نامحدود
🗳 پارک دامین نامحدود
🗃 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 70 عدد
👥 مستر ریسلر های قابل ساخت 5 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP
🔅 با این سرویس شما می توانید ریسلر و مستر ریسلر ارائه دهید.

💎 قیمت ماهانه 40000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=13

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

Beta-Two

🗄 فضا 110 گیگابایت SSD
📡 پهنای باند نامحدود
🗳 پارک دامین نامحدود
🗃 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 90 عدد
👥 مستر ریسلر های قابل ساخت 10 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP
🔅 با این سرویس شما می توانید ریسلر و مستر ریسلر ارائه دهید.

💎 قیمت ماهانه 54000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=14

─────┅┅══┅┅─────
"
]);
sleep(1);
            bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

Seta-Three

🗄 فضا 180 گیگابایت SSD
📡 پهنای باند نامحدود
🗳 پارک دامین نامحدود
🗃 ساب دامین نامحدود
🗂 حداکثر اکانت سی پنل 120 عدد
👥 مستر ریسلر های قابل ساخت 20 عدد
📑 DNS اختصاصی
📂 بکاپ گیری به صورت هفتگی و ماهانه
📯 وب سرور لایت اسپید
🏷 دارای کلاد لینوکس (Cloud Linux)
🔐 دارای انتی شلر قوی CXS
📝 ورژن پی اچ پی انتخابی
🖇 اپتایم 99.9%
📋 پلاگین WHMAMP
▫️مقدار فضا نامحدود SSD
🔅 با این سرویس شما می توانید ریسلر و مستر ریسلر ارائه دهید.

💎 قیمت ماهانه 69000 تومان💰

⌛️لینک جهت خرید 👇

🌐 https://test.ir/cart.php?a=add&pid=15

─────┅┅══┅┅─────
"
]);
          sleep(1);
           bot('sendMessage',[
        'chat_id'=> $chat_id,
        'text' => "
─────┅┅══┅┅─────

🔻تمامی سرویس های بالا پس از پرداخت بصورت آنی به شما تحویل داده میشود ..

─────┅┅══┅┅─────

📣 کانال ما : $channel
🌐 سایت ما : $webhost
"
]);
    }

 //-------------------------------------------//
    elseif ($text == "•🎖 (جمع آوری امتیاز) 🎖•") {
  var_dump(bot('sendPhoto',[
        'chat_id'=>$update->message->chat->id,
        'photo'=>"https://t.me/hamedlxbot/293",
        'caption'=>"
هاست میخوای⁉️

اما نداری❗️

🔆 خب اینکه کاری نداره😬

برای دریافت بنر روی دکمه شیشه ای زیر کلید کنید👇
",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
                [
 ['text' => "📥 دریافت بنر 📥", 'callback_data' => "ba"]
                    ],
                ]
            ])
        ]));
 bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻شما با پخش لینک خودتان میتوانید موجودی خود افزایش دهید ، به ازای هر نفری که با لینک شما وارد ربات بشود 50 تومان به موجودی شما واریز میگردد ..

▫️پس از افزایش موجودی خودتان به قسمت خرید هاست رفته و سرویس مورد نظر خودتون رو سفارش بدهید ..
",
'reply_to_message_id'=>$message_id,
       'reply_markup' => json_encode([
                'keyboard' => [
[['text' => "↪️ بازگشت"]],
]
])
]); 
} elseif ($data == "ba") {
       sendAction($chatid, 'typing');
      bot('sendvideo', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
             'video'=>"https://t.me/hamedlxbot/292",///دست نزنید اینو//
        'caption'=>"
✅ اولین ربات دریافت دهی هاست رایگان 🤖

▫️هاست پرسرعت
▫️سرور مجازی

💰با ارزان ترین قیمت سروری رو که میخای رو بخر😍

💎 امکان زیر مجموعه گیری و دریافت هاست رایگان

💵 امکان اخذ نمایندگی و کسب درآمد

📌 همین الان کلیک کن 👇

https://t.me/$Botid?start=$chatid",
        ]);
           }
 //-------------------------------------------//
    elseif ($text == '▪حساب کاربری▪') {
	$zaman = file_get_contents("data/$chat_id/zaman.txt");
    $saat = file_get_contents("data/$chat_id/saat.txt");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
            🔹زمان و تاریخ عضویت در ربات
            
🎗تاریخ: $zaman
🕛 ساعت: $saat

─────┅┅══┅┅─────

👤 نام : $first_name
🎟 آیدی : $chat_id

─────┅┅══┅┅─────

💰 موجودی : $coin تومان
💵 کل مبلغ خریداری شده : $hazineh تومان
👥 زیر مجموعه ها : $ref نفر

─────┅┅══┅┅─────

🔻آخرین وضعیت شما در امروز🔻

📅 تاریخ: $fadate
⏰ ساعت: $fatime
",
            'parse_mode' => 'HTML',
        ]);
    }
    //-------------------------------------------//
    elseif ($text == '📮تیکت و پشتیبانی ربات📮') {
        file_put_contents("data/$chat_id/command.txt", "support");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "📩 پیام خود را ارسال کنید :",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "↪️ بازگشت"]],
                ], 'resize_keyboard' => true,
            ])
        ]);
    } elseif ($command == 'support') {
        if (!in_array($chat_id, $blist)) {
            bot("forwardMessage", ['chat_id' => $admin, 'from_chat_id' => $chat_id, 'message_id' => $message_id]);
            sendmessage($chat_id, "✅ پیام شما ارسال شد.", "HTML");
        } else {
            file_put_contents("data/$chat_id/command.txt", "none");
            sendmessage($chat_id, "⛔️ شما بدلیل تخلف مسدود شده اید", "HTML");
        }
    } elseif ($chat_id == $admin and $reply) {
        if ($text == "/ban") {
            if (!in_array($re_id, $blist)) {
                file_put_contents("data/banlist.txt", "\n" . $re_id, FILE_APPEND);
                sendmessage($chat_id, "❌ کاربر مسدود شد .", "HTML");
            }
        } elseif ($text == "/unban") {
            if (in_array($re_id, $blist)) {
                $bli = str_replace("\n" . $re_id, '', $banlist);
                file_put_contents("data/banlist.txt", $bli);
                sendmessage($chat_id, "✅ کاربر آزاد شد .", "HTML");
            }
        } else {
            sendmessage($re_id, $text, "HTML");
            sendmessage($chat_id, "✅ پیام شما ارسال شد.", "HTML");
        }
    }
 //-------------------------------------------//
 if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$text1)){
 bot ('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=> '🔖 این ربات توسط @ShahreSource ساخته شده است✅',
  ]);
 }
  //-------------------------------------------//
elseif ($text == '🎁سرویس رایگان🎁') {      
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "💠 سرویس مورد نظر را انتخاب کنید :",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🏷 فضا 1GB | قیمت 5000💰"]],
                    [['text' => "🏷 فضا 5GB | قیمت 8000💰"]],
                    [['text' => "🏷 فضا 10GB | قیمت 12000💰"]],
                    [['text' => "🏷 فضا 15GB | قیمت 20000💰"]],
                    [['text' => "🏷 فضا 20GB | قیمت 27000💰"]],                             
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    } 
//-------------------------------------------//
elseif ($textmassage == "🏷 فضا 1GB | قیمت 5000💰"){
        file_put_contents("data/$chat_id/ted.txt", "5000");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $coin = file_get_contents("data/$chat_id/coin.txt");
        if ($coin > $aaa) {
            file_put_contents("data/$chat_id/ShahreSource.txt", "hostdhi1");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
                ✅ مقدار $aaa از شما بابت خرید کم شد
                
✅ حالا دامنه ایی که میخواهید هاست روش اجرا بشه رو بفرستید ..

📌 مثال ??

https://yoursite.ir

⚠️ یا اگر دامنه ای ندارید فقط کافیه یک اسم بفرستید تا به عنوان زیر دامین هاست دریافت کنید ..

📌 مثال 👇

ShahreSource

 ",
    'reply_to_message_id'=>$message_id,
    
        ]);
    } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
⚠️ موجودی شما کافی نیست . . .

💰موجودی شما : $coin
🎗هزینه این سفارش : 5000💰
",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                        [['text' => "↪️ بازگشت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
        }
//-------------------------------------------//
elseif ($textmassage == "🏷 فضا 5GB | قیمت 8000💰"){
        file_put_contents("data/$chat_id/ted.txt", "8000");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $coin = file_get_contents("data/$chat_id/coin.txt");
        if ($coin > $aaa) {
            file_put_contents("data/$chat_id/ShahreSource.txt", "hostdhi2");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
                ✅ مقدار $aaa از شما بابت خرید کم شد
                
✅ حالا دامنه ایی که میخواهید هاست روش اجرا بشه رو بفرستید ..

📌 مثال 👇

https://yoursite.ir

⚠️ یا اگر دامنه ای ندارید فقط کافیه یک اسم بفرستید تا به عنوان زیر دامین هاست دریافت کنید ..

📌 مثال 👇

ShahreSource

 ",
    'reply_to_message_id'=>$message_id,
    
        ]);
    } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
⚠️ موجودی شما کافی نیست . . .

💰موجودی شما : $coin
🎗هزینه این سفارش : 8000💰
",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                        [['text' => "↪️ بازگشت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
        }
        //-------------------------------------------//
        elseif ($textmassage == "🏷 فضا 10GB | قیمت 12000💰" ){
        file_put_contents("data/$chat_id/ted.txt", "12000");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $coin = file_get_contents("data/$chat_id/coin.txt");
        if ($coin > $aaa) {
            file_put_contents("data/$chat_id/ShahreSource.txt", "hostdhi3");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
                ✅ مقدار $aaa از شما بابت خرید کم شد
                
✅ حالا دامنه ایی که میخواهید هاست روش اجرا بشه رو بفرستید ..

📌 مثال 👇

https://yoursite.ir

⚠️ یا اگر دامنه ای ندارید فقط کافیه یک اسم بفرستید تا به عنوان زیر دامین هاست دریافت کنید ..

📌 مثال 👇

ShahreSource

 ",
    'reply_to_message_id'=>$message_id,
    
        ]);
    } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
⚠️ موجودی شما کافی نیست . . .

💰موجودی شما : $coin
🎗هزینه این سفارش : 12000💰
",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                        [['text' => "↪️ بازگشت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
        }
        //-------------------------------------------//
        elseif ($textmassage == "🏷 فضا 15GB | قیمت 20000💰"){
        file_put_contents("data/$chat_id/ted.txt", "20000");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $coin = file_get_contents("data/$chat_id/coin.txt");
        if ($coin > $aaa) {
            file_put_contents("data/$chat_id/ShahreSource.txt", "hostdhi4");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
                ✅ مقدار $aaa از شما بابت خرید کم شد
                
✅ حالا دامنه ایی که میخواهید هاست روش اجرا بشه رو بفرستید ..

📌 مثال 👇

https://yoursite.ir

⚠️ یا اگر دامنه ای ندارید فقط کافیه یک اسم بفرستید تا به عنوان زیر دامین هاست دریافت کنید ..

📌 مثال 👇

ShahreSource

 ",
    'reply_to_message_id'=>$message_id,
    
        ]);
    } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
⚠️ موجودی شما کافی نیست . . .

💰موجودی شما : $coin
🎗هزینه این سفارش : 20000💰
",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                        [['text' => "↪️ بازگشت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
        }
        //-------------------------------------------//
        elseif ($textmassage == "🏷 فضا 20GB | قیمت 27000💰"){
        file_put_contents("data/$chat_id/ted.txt", "27000");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $coin = file_get_contents("data/$chat_id/coin.txt");
        if ($coin > $aaa) {
            file_put_contents("data/$chat_id/ShahreSource.txt", "hostdhi5");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
                ✅ مقدار $aaa از شما بابت خرید کم شد
                
✅ حالا دامنه ایی که میخواهید هاست روش اجرا بشه رو بفرستید ..

📌 مثال 👇

https://yoursite.ir

⚠️ یا اگر دامنه ای ندارید فقط کافیه یک اسم بفرستید تا به عنوان زیر دامین هاست دریافت کنید ..

📌 مثال 👇

ShahreSource

 ",
    'reply_to_message_id'=>$message_id,
    
        ]);
    } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
⚠️ موجودی شما کافی نیست . . .

💰موجودی شما : $coin
🎗هزینه این سفارش : 27000💰
",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                        [['text' => "↪️ بازگشت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
        }
  //-------------------------------------------//
elseif ($ShahreSource == "hostdhi1") {
       @$al = file_get_contents("data/$chat_id/ted.txt");
        $msg_id = bot('ForwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ])->result->message_id;
        bot('sendMessage', [
            'chat_id' => $admin,
            'text' => "
🏷 شخص جدیدی درخواست هاست 1G به ارزش قیمت $al تومان کرده است ..

🔖 دامنه ایی که برای هاست درخواست کرده اند👆

📄 کد پیگیری شخص👇

📮#$msg_id

📌 رفتن به پیوی فرد برای تحویل هاست👇

[$from_id](tg://user?id=$from_id)
",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' =>  [
                        [
                           ['text' => "🔻سفارش جدید🔻",  'callback_data' => "tkmil"]
                        ],
                    ]
                ])
            ]);
            

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/coin.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/coin.txt", $getsho);
            @$masrafi = file_get_contents("data/$chat_id/masrafi.txt");
            $getmasrafi = $masrafi + $al;
            file_put_contents("data/$chat_id/masrafi.txt", $getmasrafi);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fdate);
            file_put_contents("ads/time/$msg_id.txt", $ftime);
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/msg.txt", "$msg_id");
            file_put_contents("data/$chat_id/ShahreSource.txt", "no");
                   unlink("data/$chat_id/ttt.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
📄 سفارش شما با موفقیت ثبت شده است ✅

📮 کد پیگیری شما👇

#$msg_id

⚠️ سفارش هاست شما پس از تایید شدن از طرف مدیریت ، ممکن است برای دریافت هاست ، بین 1 تا 24 ساعت طول بکشد ❎
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🎁سرویس رایگان🎁"]], 
                    [['text' => "▪حساب کاربری▪"], ['text' => "🏆محصولات ما🏆"]],
                    [['text' => "🚘تست سرویس🚘"],['text' => "🍂دریافت هاست اسپانسری🍃"]],
                    [['text' => "🌍ورود به [سایت‌‌]🌍"],['text' => "▪ناحیه کاربری▪"]],              
                    [['text' => "📮تیکت و پشتیبانی ربات📮"], ['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],                 
                    [['text' => "🎗چالش ویژه این هفته🎗"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
elseif ($ShahreSource == "hostdhi2") {
       @$al = file_get_contents("data/$chat_id/ted.txt");
        $msg_id = bot('ForwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ])->result->message_id;
        bot('sendMessage', [
            'chat_id' => $admin,
            'text' => "
🏷 شخص جدیدی درخواست هاست 5G به ارزش قیمت $al تومان کرده است ..

🔖 دامنه ایی که برای هاست درخواست کرده اند👆

📄 کد پیگیری شخص👇

📮#$msg_id

📌 رفتن به پیوی فرد برای تحویل هاست👇

[$from_id](tg://user?id=$from_id)
",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' =>  [
                        [
                           ['text' => "🔻سفارش جدید🔻",  'callback_data' => "tkmil"]
                        ],
                    ]
                ])
            ]);
            

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/coin.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/coin.txt", $getsho);
            @$masrafi = file_get_contents("data/$chat_id/masrafi.txt");
            $getmasrafi = $masrafi + $al;
            file_put_contents("data/$chat_id/masrafi.txt", $getmasrafi);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fdate);
            file_put_contents("ads/time/$msg_id.txt", $ftime);
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/msg.txt", "$msg_id");
            file_put_contents("data/$chat_id/ShahreSource.txt", "no");
                   unlink("data/$chat_id/ttt.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
📄 سفارش شما با موفقیت ثبت شده است ✅

📮 کد پیگیری شما👇

#$msg_id

⚠️ سفارش هاست شما پس از تایید شدن از طرف مدیریت ، ممکن است برای دریافت هاست ، بین 1 تا 24 ساعت طول بکشد ❎
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🎁سرویس رایگان🎁"]], 
                    [['text' => "▪حساب کاربری▪"], ['text' => "🏆محصولات ما🏆"]],
                    [['text' => "🚘تست سرویس🚘"],['text' => "🍂دریافت هاست اسپانسری🍃"]], 
                    [['text' => "🌍ورود به [سایت‌‌]🌍"],['text' => "▪ناحیه کاربری▪"]],             
                    [['text' => "📮تیکت و پشتیبانی ربات📮"], ['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],           
                    [['text' => "🎗چالش ویژه این هفته🎗"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    elseif ($ShahreSource == "hostdhi3") {
       @$al = file_get_contents("data/$chat_id/ted.txt");
        $msg_id = bot('ForwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ])->result->message_id;
        bot('sendMessage', [
            'chat_id' => $admin,
            'text' => "
🏷 شخص جدیدی درخواست هاست 10G به ارزش قیمت $al تومان کرده است ..

🔖 دامنه ایی که برای هاست درخواست کرده اند👆

📄 کد پیگیری شخص👇

📮#$msg_id

📌 رفتن به پیوی فرد برای تحویل هاست👇

[$from_id](tg://user?id=$from_id)
",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' =>  [
                        [
                           ['text' => "🔻سفارش جدید🔻",  'callback_data' => "tkmil"]
                        ],
                    ]
                ])
            ]);
            

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/coin.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/coin.txt", $getsho);
            @$masrafi = file_get_contents("data/$chat_id/masrafi.txt");
            $getmasrafi = $masrafi + $al;
            file_put_contents("data/$chat_id/masrafi.txt", $getmasrafi);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fdate);
            file_put_contents("ads/time/$msg_id.txt", $ftime);
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/msg.txt", "$msg_id");
            file_put_contents("data/$chat_id/ShahreSource.txt", "no");
                   unlink("data/$chat_id/ttt.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
📄 سفارش شما با موفقیت ثبت شده است ✅

📮 کد پیگیری شما👇

#$msg_id

⚠️ سفارش هاست شما پس از تایید شدن از طرف مدیریت ، ممکن است برای دریافت هاست ، بین 1 تا 24 ساعت طول بکشد ❎
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🎁سرویس رایگان🎁"]], 
                    [['text' => "▪حساب کاربری▪"], ['text' => "🏆محصولات ما🏆"]],
                    [['text' => "🚘تست سرویس🚘"],['text' => "🍂دریافت هاست اسپانسری🍃"]],     
                    [['text' => "🌍ورود به [سایت‌‌]🌍"],['text' => "▪ناحیه کاربری▪"]],         
                    [['text' => "📮تیکت و پشتیبانی ربات📮"], ['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],                 
                    [['text' => "🎗چالش ویژه این هفته🎗"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
/*
نویسنده این سورس 
@ShahreSource
*/
    //-------------------------------------------//
    elseif ($ShahreSource == "hostdhi4") {
       @$al = file_get_contents("data/$chat_id/ted.txt");
        $msg_id = bot('ForwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ])->result->message_id;
        bot('sendMessage', [
            'chat_id' => $admin,
            'text' => "
🏷 شخص جدیدی درخواست هاست 15G به ارزش قیمت $al تومان کرده است ..

🔖 دامنه ایی که برای هاست درخواست کرده اند👆

📄 کد پیگیری شخص👇

📮#$msg_id

📌 رفتن به پیوی فرد برای تحویل هاست👇

[$from_id](tg://user?id=$from_id)
",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' =>  [
                        [
                           ['text' => "🔻سفارش جدید🔻",  'callback_data' => "tkmil"]
                        ],
                    ]
                ])
            ]);
            

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/coin.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/coin.txt", $getsho);
            @$masrafi = file_get_contents("data/$chat_id/masrafi.txt");
            $getmasrafi = $masrafi + $al;
            file_put_contents("data/$chat_id/masrafi.txt", $getmasrafi);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fdate);
            file_put_contents("ads/time/$msg_id.txt", $ftime);
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/msg.txt", "$msg_id");
            file_put_contents("data/$chat_id/ShahreSource.txt", "no");
                   unlink("data/$chat_id/ttt.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
📄 سفارش شما با موفقیت ثبت شده است ✅

📮 کد پیگیری شما👇

#$msg_id

⚠️ سفارش هاست شما پس از تایید شدن از طرف مدیریت ، ممکن است برای دریافت هاست ، بین 1 تا 24 ساعت طول بکشد ❎
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🎁سرویس رایگان🎁"]], 
                    [['text' => "▪حساب کاربری▪"], ['text' => "🏆محصولات ما🏆"]],
                    [['text' => "🚘تست سرویس🚘"],['text' => "🍂دریافت هاست اسپانسری🍃"]],   
                    [['text' => "🌍ورود به [سایت‌‌]🌍"],['text' => "▪ناحیه کاربری▪"]],           
                    [['text' => "📮تیکت و پشتیبانی ربات📮"], ['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],                 
                    [['text' => "🎗چالش ویژه این هفته🎗"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    elseif ($ShahreSource == "hostdhi5") {
       @$al = file_get_contents("data/$chat_id/ted.txt");
        $msg_id = bot('ForwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ])->result->message_id;
        bot('sendMessage', [
            'chat_id' => $admin,
            'text' => "
🏷 شخص جدیدی درخواست هاست 20G به ارزش قیمت $al تومان کرده است ..

🔖 دامنه ایی که برای هاست درخواست کرده اند👆

📄 کد پیگیری شخص👇

📮#$msg_id

📌 رفتن به پیوی فرد برای تحویل هاست👇

[$from_id](tg://user?id=$from_id)
",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' =>  [
                        [
                           ['text' => "🔻سفارش جدید🔻",  'callback_data' => "tkmil"]
                        ],
                    ]
                ])
            ]);
            

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/coin.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/coin.txt", $getsho);
            @$masrafi = file_get_contents("data/$chat_id/masrafi.txt");
            $getmasrafi = $masrafi + $al;
            file_put_contents("data/$chat_id/masrafi.txt", $getmasrafi);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fdate);
            file_put_contents("ads/time/$msg_id.txt", $ftime);
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/msg.txt", "$msg_id");
            file_put_contents("data/$chat_id/ShahreSource.txt", "no");
                   unlink("data/$chat_id/ttt.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
📄 سفارش شما با موفقیت ثبت شده است ✅

📮 کد پیگیری شما👇

#$msg_id

⚠️ سفارش هاست شما پس از تایید شدن از طرف مدیریت ، ممکن است برای دریافت هاست ، بین 1 تا 24 ساعت طول بکشد ❎
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🎁سرویس رایگان🎁"]], 
                    [['text' => "▪حساب کاربری▪"], ['text' => "🏆محصولات ما🏆"]],
                    [['text' => "🚘تست سرویس🚘"],['text' => "🍂دریافت هاست اسپانسری🍃"]],  
                   [['text' => "🌍ورود به [سایت‌‌]🌍"],['text' => "▪ناحیه کاربری▪"]],            
                    [['text' => "📮تیکت و پشتیبانی ربات📮"], ['text' => "•🎖 (جمع آوری امتیاز) 🎖•"]],
                    [['text' => "🎗چالش ویژه این هفته🎗"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
/////ادیت کنید///
if($text == 'ورود (حساب دارم)🚀'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
  'reply_to_message_id'=>$message_id,
 'text'=>"برای ورود به ناحیه کاربری سایت از دکمه شیشه ای زیر اقدام کرده و اطلاعات ورودتان را پر کنید و وارد شوید (:",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"ورود به ناحیه کاربری",'url' =>"https://test.ir"]]
               ],
])
]);
}
////
if($text == '🌿عضویت (حساب ندارم)'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
  'reply_to_message_id'=>$message_id,
 'text'=>"برای ثبت نام در سورس سرچ روی دکمه شیشه ای زیر بزنید تا به صفحه ثبت نام هدایت شوید👇",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"عضویت",'url' =>"https://test.ir"]]
               ],
])
]);
}
//-------------------------------------------//
elseif ($text == '🎗چالش ویژه این هفته🎗') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻به قسمت چالش هفتگی خوش آمدید

🌿 هر هفته چالش های متنوعی برای تمامی کاربران گذاشته میشود ..

🔹برای آگاه شدن از چالش میتوانید به قسمت | 🏆 چالش این هفته | سر بزنید ، همچنین برای آگاهی از اسامی برندگان از قسمت | 🎖اسامی برندگان | مراجعه کنید ..
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "🏆 چالش این هفته"], ['text' => "🎖اسامی برندگان"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    } elseif ($text == '🏆 چالش این هفته') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
$mtnechlsh
",
        ]);
    } elseif ($text == '🎖اسامی برندگان') {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
$asmibrnde
",
        ]);
    }
//-------------------------------------------//
if ($text == '/panel' and $chat_id == $admin) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻به پنل مدیریت خوش آمدید
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    if ($text == '🔙 بازگشت به مدیریت' and $chat_id == $admin) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻به پنل مدیریت دوباره خوش آمدید ..
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    if ($text == '🔹افزایش موجودی' and $chat_id == $admin) {
        file_put_contents("data/$from_id/command.txt", "buy");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "❎ خوب حالا آیدی عددی کاربر مورد نظر رو بفرست تا موجودیش رو زیاد کنم",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($command == 'buy') {
        file_put_contents("data/buy.txt", $text);
        file_put_contents("data/$from_id/command.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❎ خب تعداد موجودی که میخای زیاد رو بفرست",
            'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'reply_markup'=> json_encode([
                    'keyboard' => [
                        [['text' => "🔙 بازگشت به مدیریت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        } elseif ($command == 'buy2') {
    $buy = file_get_contents("data/buy.txt");
          $fle = file_get_contents("data/$buy/coin.txt");
               $getshe = $fle + $text;
                file_put_contents("data/$buy/coin.txt", $getshe);
        file_put_contents("data/$from_id/command.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "📢 کاربر عزیز ...
💎 مقدار $text موجودی از طرف مدیریت به شما اضافه شد 📈"
        ]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' => "❎ با موفقیت فرستاده شد",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    if ($text == 'کسر موجودی🔹' and $chat_id == $admin) {
        file_put_contents("data/$from_id/command.txt", "buykm");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "❎ خوب حالا آیدی عددی کاربر مورد نظر رو بفرست تا موجودیش رو کم کنم",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=> json_encode([
                    'keyboard' => [
                        [['text' => "🔙 بازگشت به مدیریت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        } elseif ($command == 'buykm') {
        file_put_contents("data/buykm.txt", $text);
        file_put_contents("data/$from_id/command.txt", "buykm2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❎ خب تعداد موجودی که میخای کم رو بفرست",
            'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'reply_markup'=> json_encode([
                    'keyboard' => [
                        [['text' => "🔙 بازگشت به مدیریت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        } elseif ($command == 'buykm2') {
    $buy = file_get_contents("data/buykm.txt");
          $fle = file_get_contents("data/$buy/coin.txt");
               $getshe = $fle - $text;
                file_put_contents("data/$buy/coin.txt", $getshe);
        file_put_contents("data/$from_id/command.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "📢 کاربر عزیز ...
💎 مقدار $text موجودی از طرف مدیریت از شما کم شد 📉"
        ]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' => "❎ با موفقیت کم شد",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    if ($text == '🔖 تعیین متون چالش' and $chat_id == $admin) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🔖 به قسمت تعیین متن قسمت چالش خوش آمدید ..",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"🔖 ثبت متن چالش"], ['text'=>"🔖 ثبت متن برندگان"]],
 [['text'=>"🔙 بازگشت به مدیریت"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    }
    //-------------------------------------------//
    if ($text == '🔖 ثبت متن چالش' and $chat_id == $admin) {
file_put_contents("data/$from_id/command.txt", "mtnechlsh");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text' => "❎ خب حالا متنی که برای چالش ثبت کنی رو بفرست ..",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=> json_encode([
                    'keyboard' => [
                        [['text' => "🔙 بازگشت به مدیریت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
elseif($command == "mtnechlsh" and $textmessage != "🔙 بازگشت به مدیریت"){
file_put_contents("data/$from_id/command.txt","none");
file_put_contents("data/mtnechlsh.txt",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text' => "✅ با موفقیت ثبت شد",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    if ($text == '🔖 ثبت متن برندگان' and $chat_id == $admin) {
file_put_contents("data/$from_id/command.txt", "asmibrnde");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text' => "❎ خب حالا متنی که برای برندگان ثبت کنی رو بفرست ..",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=> json_encode([
                    'keyboard' => [
                        [['text' => "🔙 بازگشت به مدیریت"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
elseif($command == "asmibrnde" and $textmessage != "🔙 بازگشت به مدیریت"){
file_put_contents("data/$from_id/command.txt","none");
file_put_contents("data/asmibrnde.txt",$text);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text' => "✅ با موفقیت ثبت شد",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
    //-------------------------------------------//
    if ($text == '🗂 پشتیبان گیری' and $chat_id == $admin) {
    		var_dump(bot('sendMessage',[
        	'chat_id'=>$update->message->chat->id,
        	'text'=>"🗂 به قسمت بکاپ گیری خوش آمدید ..",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
		'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
            	'keyboard'=>[
                   [['text'=>"🗳 بکاپ از کاربران"]],
                   [['text'=>"🔙 بازگشت به مدیریت"]]
            	],
            	'resize_keyboard'=>true
       		])
    		]));
    		
	}
     if ($text == '🗳 بکاپ از کاربران' and $chat_id == $admin) {
    SendMessage($chat_id,"■ نسخه پشتیبان درحال آماده سازی است.\n■ منتظر بمانید ...", 'MarkDown', $message_id);
copy('data/members.txt','members.txt');
 $file_to_zip = array('members.txt');
 $create = CreateZip($file_to_zip, "backup.zip");
 $zipfile = new CURLFile("backup.zip");
 SendDocument($chat_id, $zipfile, "This Backup Of user\n📅 تاریخ: $fadate\n⏰ ساعت: $fatime");
 unlink('members.txt');
 unlink('backup.zip');
 unlink('updates.txt');

  
}
    //-------------------------------------------//
    if ($text == 'پیام همگانی' and $chat_id == $admin) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"آیا میخواهید پیام همگانی ارسال کنید؟",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"بله"],['text'=>"🔙 بازگشت به مدیریت"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    } if ($text == 'بله' and $chat_id == $admin) {
    file_put_contents("data/$from_id/command.txt","pmall");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"لطفا پیام خود را ارسال کنید تا به همه اعضا ارسال کنم",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"🔙 بازگشت به مدیریت"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    } elseif($command == "pmall" and $textmessage != "🔙 بازگشت به مدیریت"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"پیام همگانی ارسال شد",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    file_put_contents("data/$from_id/command.txt","");
	$all_member = fopen( "data/members.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($textmessage != null){
			SendMessage($user,$textmessage,"html");
			}
		}
    }
    if ($text == 'فروارد همگانی' and $chat_id == $admin) {
        bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "آیا میخواهید فروراد همگانی کنید؟",
        'reply_to_message_id'=>$message_id,
        'parse_mode' => "MarkDown",
        'disable_web_page_preview'=>true,
            'reply_markup' => json_encode([
                'keyboard' => [
                     [['text'=>"آری"],['text'=>"🔙 بازگشت به مدیریت"]]
                     ],
        "resize_keyboard"=>true,
    ])
    ]);
    } 
    if ($text == 'آری' and $chat_id == $admin) {
    file_put_contents("data/$from_id/command.txt","fwdall");
        bot('sendMessage',[
        'chat_id' => $chat_id,
        'text'=>"لطفا پیام خود را ارسال کنید تا به همه اعضا فروارد کنم",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"🔙 بازگشت به مدیریت"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    } elseif($command == "fwdall" and $textmessage != "🔙 بازگشت به مدیریت"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"پیام شما به همه اعضا فروراد شد",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=> json_encode([
           'keyboard'=>[
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "کسر موجودی🔹"], ['text' => "🔹افزایش موجودی"]],
                    [['text' => "🔖 تعیین متون چالش"]],
                    [['text' => "↪️ بازگشت"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    file_put_contents("data/$from_id/command.txt","");
    $all_memberr = fopen( "data/members.txt", 'r');
		while( !feof( $all_memberr)) {
 			$userr = fgets( $all_memberr);
ForwardMessage($userr,$admin,$message_id);
		}
    }
//-------------------------------------------//
if ($text == '📊 آمار و اطلاعات' and $chat_id == $admin) {
    sendMessage($chat_id, "📍 تعداد کل کاربران : " . count($memlist) . "\n🏷 تعداد کل فروش : $AllBuyT\n📌 آخرین وضعیت ربات شما\n📅 تاریخ: $fadate\n⏰ ساعت: $fatime", "HTML");
}
//-------------------------------------------//
if (file_exists("error_log")) unlink("error_log");
}
/*
کانال شهر سورس مرجع انواع سورس کد های مختلف
بانک انواع سورس کد های مختلف به صورت کاملا تست شده
هر روز کلی سورس کد و اسکریپت منتظر شماست !

@ShahreSource
https://t.me/ShahreSource
*/
?>