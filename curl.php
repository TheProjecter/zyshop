<?php
$ch = curl_init();
$post_data = array (
	"filename" => '@E:\example.txt'
);
$url = "http://ci.com/agentdata/upload/10002";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_REFERER, "http://ci.com/agentdata/upload/10002");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_exec($ch);
/*
if(curl_exec($ch) === FALSE)
{
	echo "<br/>","  cUrl Error:".curl_error($ch);
}
*/
curl_close($ch);




//END