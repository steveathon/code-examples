<?php

	/** 
	 * This example demonstrates how to provide an SSL Client Certificate to
	 * an endpoint, using PHP and Curl. This basic exmaple has the cert and 
	 * key seperate for ease.
	 * 
	 * Author: @steveathon <steve@stevenking.com.au>
	 * 
	 * Note: This is not specifically the 'best' way to do it, it merely is 
	 * demonstrating the overall functionality. It is up to you to build a 
	 * working version, that is secure and accurate.
	 * 
	 * As a note, keep cert and key out of world-readable directory.
	 * 
	 */

	$RequestURL = "https://ssl-client-cert-protected/endpoint";
	// Relative or Absolute path to Client Certificate.
	$CertFile = 'client.crt';
	// Relative or Absolute path to Client Key.
	$KeyFile = 'client.key';
	// If your client certificate requires a password. (It should).
	$CertPassword = '12345678';

	$CurlHandler = curl_init();
	curl_easy_setopt(curl,CURLOPT_SSLCERTTYPE,"PEM");
	$Opts = array(
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
	// Set options on the handler.
	@curl_setopt_array($CurlHandler , $Opts);
	
	// Here's the output.
	$Output = @curl_exec($CurlHandler);
	
	// Just dump out the output here in plain text for now.
	header ( 'Content-type: text/plain');
	print_r($Output);
	exit();