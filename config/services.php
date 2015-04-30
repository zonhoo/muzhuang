<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

    'github' => [
        'client_id' => env('Client_ID'),
        'client_secret' => env('Client_Secret'),
        'redirect' => env('GITHUB_CALLBACK_URL'),
    ],
    'weibo' => [
        'client_id' => env('WB_AKEY'),
        'client_secret' => env('WB_SKEY'),
        'redirect' => env('WB_CALLBACK_URL'),
    ],
    'weixin'=> [
        'client_id' => env('WECHAT_AKEY'),
        'client_secret' => env('WECHAT_SKEY'),
        'redirect' => env('WECHAT_GITHUB_CALLBACK_URL'),
    ],

];
