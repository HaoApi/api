<?php
//扩展层
include_once 'e/Aes.Ext.php';

//C层
include_once 'c/Base.Controller.php';
include_once 'c/Users.Controller.php';

//Mysql底层操作必须引入
include_once 'm/Mysql.Model.php';

//M层
include_once 'm/Users.Model.php';

//得到路由关联的控制器
function getMap($_c) {
	
	//配置用户访问的名称，及对应的控制器
	$_map_controller = array (
		'Users' => 'UsersController' 
	);
	$objectClass = isset ( $_map_controller [$_c] ) ? $_map_controller [$_c] : null;
	return $objectClass;
}

function Run($_c) {
	$objectClass = getMap ( $_c );
	if (! $objectClass) {
		echo '{"statusCode":9990,"message":"未找到请求的数据","result":""}';
		exit ();
	}
	return new $objectClass ();
}