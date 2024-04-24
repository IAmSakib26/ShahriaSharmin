<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Location</title>
</head>
<body>
<?php
//Get visitor IP
function getUserIP(){
	$client=@$_SERVER['HTTP_CLIENT_IP'];
	$forward=@$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote=$_SERVER['REMOTE_ADDR'];

	if(filter_var($client, FILTER_VALIDATE_IP)){$ip=$client;}
	elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip=$forward;}
	else{$ip=$remote;}
	return $ip;
}

//Get the data from a URL
function get_url($url){
	$ch=curl_init();

	if($ch===false){die('Failed to create curl object');}

	$timeout=5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data=curl_exec($ch);
	curl_close($ch);
	return $data;
}

$sIP=getUserIP();
//echo "User IP: ".$sIP."<br>";

$sjJSon=get_url('https://www.iplocate.io/api/lookup/'.$sIP);
$sjJSon1=(explode(",", $sjJSon));
echo "Country: ".$sjJSon1[1]."<br>";
echo "City: ".$sjJSon1[3]."<br><hr>";

if( ($sjJSon1[1]!='"country":"Bangladesh"') && ($sjJSon1[3]!='"city":"Dhaka"') ){
	echo "Redirect to Home page";
}
?>
</body>
</html>