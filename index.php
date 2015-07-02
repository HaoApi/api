<?php
header ( "Content-type:text/html;charset=utf-8" );
//路由文件
include_once 'config/config.route.php';

//API请求访问路由要求  
//GET方式 http://xxx.com/配置的访问名称/要访问的具体方法/参数key值/参数值/参数key值/参数值/参数key值/参数值
//POST方式 http://xxx.com/配置的访问名称/要访问的具体方法

$_req = $_REQUEST;
$_req = array_keys ( $_req );
if (! isset ( $_req [0] )) {
	echo '{"statusCode":404,"message":"您的请求错误","result":null}';
	exit ();
}
$_req = explode ( "/", $_req [0] );
array_shift ( $_req );

if (! isset ( $_req [0] )) {
	echo '{"statusCode":404,"message":"您的请求错误","result":null}';
	exit ();
}

$objClass = Run ( $_req [0] );
$objClass->$_req [1] ();

