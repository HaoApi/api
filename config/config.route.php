<?php
/**
 * 
 * 自动引入 所需要的文件
 * @param 文件夹名称 $files
 * @param 文件的后缀名，默认*（全部） $flags
 */
function includeFile($files = null, $flags = '*') {
	if (empty ( $files )) {
		return null;
	}
	$_files = glob ( $files . '/*.' . $flags );
	foreach ( $_files as $k => $v ) {
		include_once $v;
	}
}

//引入m层
includeFile ( 'm' );
//引入c层
includeFile ( 'c' );
//引入e层
includeFile ( 'e' );

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
		echo '{"statusCode":404,"message":"您的请求错误","result":null}';
		exit ();
	}
	return new $objectClass ();
}