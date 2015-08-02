<?php
/**
 * 
 * 本类为C层的基类
 * @author Mr.Hao
 * @qq 409328820
 * @email 409328820@qq.com
 *
 */
class BaseController {
	
	public function __construct() {
	
	}
	
	public function __call($func, $params) {
		$this->callback ( 9991, $func . ' 方法未找到' );
	}
	
	/**
	 * 
	 * 实例化模型
	 * @param char $model
	 */
	public function M($model = '') {
		$model .= 'Model';
		if (! class_exists ( $model )) {
			$this->callback ( 9995, $model . ' 模型未找到' );
		}
		$modelObject = new $model ();
		return $modelObject;
	}
	
	/**
	 * 
	 * 返回操作
	 * @param int $code 返回状态
	 * @param char $msg 返回提示
	 * @param array or char $data 要返回的数据
	 */
	public function callback($code = 200, $msg = 'ok', $data = null) {
		$_d ['statusCode'] = $code;
		$_d ['message'] = $msg;
		$_d ['result'] = $data;
		echo json_encode ( $_d );
		exit ();
	}
	
	/**
	 * 
	 * 获取参数
	 * @param char $_params	需要取的key值
	 */
	public function get($_params = '') {
		$_req = $_REQUEST;
		if (strtoupper ( $_SERVER ['REQUEST_METHOD'] ) == 'GET') {
			$_req = array_keys ( $_req );
			$_req = explode ( "/", $_req [0] );
			array_shift ( $_req );
			$_key = array_search ( $_params, $_req );
			if (! $_key) {
				$this->callback ( 9992, $_params . '未找到的参数' );
			}
			if (isset ( $_req [$_key + 1] ) && ! empty ( $_req [$_key + 1] )) {
				return $_req [$_key + 1];
			} else {
				$this->callback ( 9993, $_params . '数据不能为空' );
			}
		} elseif (strtoupper ( $_SERVER ['REQUEST_METHOD'] ) == 'POST') {
			if (isset ( $_req [$_params] ) && ! empty ( $_req [$_params] )) {
				return $_req [$_params];
			} else {
				$this->callback ( 9994, $_params . '数据不能为空' );
			}
		} elseif (strtoupper ( $_SERVER ['REQUEST_METHOD'] ) == 'PUT') {
		
		} elseif (strtoupper ( $_SERVER ['REQUEST_METHOD'] ) == 'DELETE') {
		
		}
	
	}
	
	/**
	 * 
	 * 获取Aes解密之后的key值
	 * @param 解密之后的字符串 $str
	 * @param 要取的key $key
	 */
	public function getAesKey($str = '', $key = '') {
		parse_str ( $str, $strArr );
		if (is_array ( $strArr )) {
			return isset ( $strArr [$key] ) ? $strArr [$key] : $this->callback ( 9994, $key . '数据不能为空' );
		} else {
			$this->callback ( 9992, '未找到的解密串' );
		}
	}
	
	/**
	 * 
	 * 获取客户端真实IP
	 */
	protected function getClientIp() {
		if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
			$ip = getenv ( "HTTP_CLIENT_IP" );
		else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
			$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
		else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
			$ip = getenv ( "REMOTE_ADDR" );
		else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
			$ip = $_SERVER ['REMOTE_ADDR'];
		else
			$ip = "192.168.1.2";
		return $ip;
	}
}