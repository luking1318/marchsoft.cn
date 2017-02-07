<?php
return array(
		//'配置项'=>'配置值'
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	// 'DB_HOST'=>'114.215.155.69',
	'alipay'=>array(
		'partner'		=> '2088521734409292',
		'seller_id'	=> '2088521734409292',
		'key'			=> 'za5uhkj2d9rz1vaycdlkv69cw3en5up3',
		'sign_type'    => strtoupper('MD5'),
		'input_charset'=> strtolower('utf-8'),
		'cacert'    => getcwd().'\\cacert.pem',
		'transport'    => 'http',
		'service' => "create_direct_pay_by_user",
	),

 	'DB_NAME'=>'marchsoftv2',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',

	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'march_',
	'APP_DEBUG'=>true,
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',

	'URL_HTML_SUFFIX'=>'.html',
	'DB_FIELD_CACHE'=>false,
    	'HTML_CACHE_ON'=>false,
	
	'DB_FIELD_CACHE'=>false,
    	'HTML_CACHE_ON'=>false,
);
?>
