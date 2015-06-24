<?php if(!defined("ROOTPATH")){die("Access forbidden.".PHP_EOL);}
return array(
	'auth_url' => 'http://frappe.local/api/method/login',
	'api_url' => 'http://frappe.local/api/resource/',
	'auth' => array('usr' => 'erp@example.com', 'pwd' => 'password'),
	'cookie_file' => '/var/www/erpnext/tmp/cookie.txt',
	'curl_timeout' => 30,

	'basic_auth' => array(),
//	'basic_auth' => array('usr' => '', 'pwd' => ''),

);
//