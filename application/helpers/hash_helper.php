<?php
/*
Description: hash_helper is a CodeIgniter help file designed to demonstrate and make available safe hashing methods for developers.
Citations:
	CodeIgniter: http://www.codeigniter.com/
Functions used:
	PHP 5.1.2 hash - http://php.net/manual/en/function.hash.php
Written By: Louis Milotte
Email: louis.milotte@rvathetech.com
Website: http://www.rvathetech.com
Download: https://github.com/LouisMilotte/codeigniter/blob/master/helpers/hash_helper.php
Install instructions:
	Install this file into your existing CodeIgniter installation. /application/helpers/hash_helper.php
Loading:
	To run this file in your installation read: https://ellislab.com/codeigniter/user-guide/general/autoloader.html and https://ellislab.com/codeigniter/user-guide/general/helpers.html
	If you use the $this->load->helper(); method; the name of the file to be loaded is 'hash'. Ergo, $this->load->helper('hash');
*/
if(!function_exists('generate_salt')){
	function generate_salt($length = 10){
		/*to change how long the salt will be change the value of $length*/
		/*Generate a Pseudo-Random Alphanumeric Salt*/
		$source = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$i=0;
		$salt = '';
		while($i<$length){
			$salt.=substr($source,rand(1,strlen($source)),1);
			$i+=1;
		}
		return $salt;
	}
}
if(!function_exists('generate_key')){
	function generate_key($length = 30){
		//To change key length: change the value of $length.
		return $this->generate_salt($length);
	}
}
if(!function_exists('generate_hash')){
	function generate_hash($salt,$password,$algo = 'sha256'){
		/*
		*	$salt is the returned value of generate_salt function.
		*	$password is the string desired to be hashed.
		*	$algo is the desired algorithm; this algorithm must be supported by your server.	
		*/
		return hash($algo,$salt.$password);
	}
}
