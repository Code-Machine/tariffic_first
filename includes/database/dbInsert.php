<?php

include("dbConnection.php");

//getVariables from flash
$Table = $_GET['Table'];
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

///////////////////////////////////////////////////////////////////////////////////////////
//Company
///////////////////////////////////////////////////////////////////////////////////////////
if ($Table == "Refferal") {	
	$YourName = $_POST['your_name'];
	$YourSurname = $_POST['your_surname'];
	$YourEmail = $_POST['your_email'];
	$YourCell = $_POST['your_cell'];	
	
	//company name
	$CompanyName = "";
	foreach ($_POST['company_name'] as $value) {
		if ($value) {
			$CompanyName = $CompanyName . str_replace("&","and",$value) . ",";
		}
	}
	
	//contact name
	$ContactName = "";
	foreach ($_POST['contact_name'] as $value) {
		if ($value) {
			$ContactName = $ContactName . str_replace("&","and",$value) . ",";
		}
	}
	
	//contact job title
	$ContactJobTitle = "";
	foreach ($_POST['contact_job'] as $value) {
		if ($value) {
			$ContactJobTitle = $ContactJobTitle . str_replace("&","and",$value) . ",";
		}
	}
	
	//contact email
	$ContactEmail = "";
	foreach ($_POST['contact_email'] as $value) {
		if ($value) {
			$ContactEmail = $ContactEmail . str_replace("&","and",$value) . ",";
		}
	}
	
	//contact phone
	$ContactPhone = "";
	foreach ($_POST['contact_phone'] as $value) {
		if ($value) {
			$ContactPhone = $ContactPhone . str_replace("&","and",$value) . ",";
		}
	}
	
	//contact how
	$ContactHow = "";
	foreach ($_POST['contact_how'] as $value) {
		if ($value) {
			$ContactHow = $ContactHow . str_replace("&","and",$value) . ",";
		}
	}
	
	$Refferal = mysql_query("INSERT INTO refferals (Name, Surname, Email, Cell, Companies, ContactNames, ContactJobTitles, ContactEmails, ContactPhone, ContactHow) VALUES ('" . $YourName . "','" . $YourSurname . "','" . $YourEmail . "','" . $YourCell . "','" . $CompanyName . "','" . $ContactName . "','" . $ContactJobTitle . "','" . $ContactEmail . "','" . $ContactPhone . "','" . $ContactHow . "')");
	
	//mail to Tariffic
	$message_tariffic = "<img src='https://refer.tariffic.com/images/Logo.png' /><p style='font-family:Arial, sans-serif; font-style:normal; font-size:18px; color:#f36d44;'>A new referral has been submitted.</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:14px; color:#726659; font-weight:bold;'>Personal Details:</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:12px; color:#726659;'>Name: " . $YourName . "<br />Surname: " . $YourSurname . "<br />Email Address: " . $YourEmail . "<br />Cellphone Number: " . $YourCell . "</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:14px; color:#726659; font-weight:bold;'>Company Refferal Details:</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:12px; color:#726659;'><strong>Companies:</strong><br />" . str_replace(",","<br />",$CompanyName) . "<br /><br /><strong>Contacts:</strong><br />" . str_replace(",","<br />",$ContactName) . "<br /><br /><strong>Contact Job Titles:</strong><br />" . str_replace(",","<br />",$ContactJobTitle) . "<br /><br /><strong>Contact Email Addresses:</strong><br />" . str_replace(",","<br />",$ContactEmail) . "<br /><br /><strong>Contact Phone Numbers:</strong><br />" . str_replace(",","<br />",$ContactPhone) . "<br /><br /><strong>How do you know these contacts?</strong><br />" . str_replace(",","<br />",$ContactHow) . "</p>";	
	mail("aj@tariffic.com", "Subject: Website: New Referral", $message_tariffic, "From: referral@tariffic.co.za\nContent-Type: text/html; charset=iso-8859-1" );
	
	//mail to client
	$message_client = "<img src='https://refer.tariffic.com/images/Logo.png' /><p style='font-family:Arial, sans-serif; font-style:normal; font-size:18px; color:#f36d44;'>Thanks for entering and referring us some business! You submitted the details below:</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:14px; color:#726659; font-weight:bold;'>Personal Details:</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:12px; color:#726659;'>Name: " . $YourName . "<br />Surname: " . $YourSurname . "<br />Email Address: " . $YourEmail . "<br />Cellphone Number: " . $YourCell . "</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:14px; color:#726659; font-weight:bold;'>Company Refferal Details:</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:12px; color:#726659;'><strong>Companies:</strong><br />" . str_replace(",","<br />",$CompanyName) . "<br /><br /><strong>Contacts:</strong><br />" . str_replace(",","<br />",$ContactName) . "<br /><br /><strong>Contact Job Titles:</strong><br />" . str_replace(",","<br />",$ContactJobTitle) . "<br /><br /><strong>Contact Email Addresses:</strong><br />" . str_replace(",","<br />",$ContactEmail) . "<br /><br /><strong>Contact Phone Numbers:</strong><br />" . str_replace(",","<br />",$ContactPhone) . "<br /><br /><strong>How do you know these contacts?</strong><br />" . str_replace(",","<br />",$ContactHow) . "</p><p style='font-family:Arial, sans-serif; font-style:normal; font-size:12px; color:#726659;'>Regards,<br />The Tariffic Team</p>";	
	mail($YourEmail, "Subject: Thank you for your refferal", $message_client, "From: referral@tariffic.co.za\nContent-Type: text/html; charset=iso-8859-1" );
	
	header( 'Location: ../../thankyou.php' );
}

?>