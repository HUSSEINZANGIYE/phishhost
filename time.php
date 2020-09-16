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



error_reporting(0);
include ("jdf.php");
date_default_timezone_set('Asia/Tehran');
header('Content-Type: application/json');

$saat = date('H:i:s');
$roz = jdate('l');
$tarikh = gregorian_to_jalali(date('Y'), date('m'), date('d'), '/');

$json = ['time'=>$saat,'date'=>$tarikh,'today'=>$roz];



$connect = @new MySqli('localhost', 'novatea1_ramin6rr', 'ramin20924313', 'novatea1_api');
if(empty(mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `api` WHERE `name` = 'time'")))){
    $connect->query("INSERT INTO `api` (name, count) VALUES ('time', '0')");
}else{
    $count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `api` WHERE `name` = 'time'"))['count']+1;
    $connect->query("UPDATE `api` SET count = '$count' WHERE name = 'time'");
}

?>