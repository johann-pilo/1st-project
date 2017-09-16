

<?php
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
echo "country: ".$country;
if($country == "India"){
	echo "hi india";
}
else{
	echo "hi others";
}
?>

