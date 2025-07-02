<?php

$asda6d7ad123bjhs = '2131k2j3b13jhb132j';

if (function_exists('themesiakey') === false) {
	function themesiakey($key = false, $string = '')
	{
		if (!$key) {
			$key = 'themesiaprodukkey123131313123';
		}
		$output = false;
		$encrypt_method = 'AES-256-CBC';
		$secret_key = md5($key);
		$secret_iv = $key;
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);

		return $output;
	}
}
