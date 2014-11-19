<?php

	$RequestURL = "https://ssl-client-cert-protected/endpoint";
	$CertFile = 'client.crt';
	$KeyFile = 'client.key';
	$CertPassword = '12345678';

	$ch = curl_init();
	//curl_easy_setopt(curl,CURLOPT_SSLCERTTYPE,"PEM");
	$options = array(
			CURLOPT_RETURNTRANSFER => true,
			//CURLOPT_HEADER         => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSLKEY => $KeyFile,
			CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)',
			//CURLOPT_VERBOSE        => true,
			CURLOPT_URL => $RequestURL,
			CURLOPT_SSLCERT => $CertFile ,
			CURLOPT_SSLCERTPASSWD => $CertPassword
	);
	@curl_setopt_array($ch , $options);
	$output = @curl_exec($ch);
	
	print_r($output);