<?php
/**
 * 
 * CURL操作类
 * @author MrHao
 * @qq 409328820
 * @email 409328820@qq.com
 *
 */
final class CurlExt {
	/**
	 * 
	 * CURL GET方式请求
	 * @param string $url
	 * @param Array $params
	 */
	public static function getHttpRes($url, $params = NULL) {
		$final_url = $url;
		if ($params != null) {
			$param = '?';
			foreach ( $params as $key => $value ) {
				$param .= $key . '=' . $value . '&';
			}
			$final_url .= $param;
		}
		$ch = curl_init ( $final_url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		if (strpos ( $final_url, 'https' ) === 0) {
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
		}
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
	
	/**
	 * 
	 * CURL POST方式请求
	 * @param string $url
	 * @param Array $data
	 * @param array $header
	 */
	public static function getHttpPostRes($data, $url, $header = array()) {
		$ch = curl_init ();
		
		curl_setopt ( $ch, CURLOPT_URL, $url ); //定义表单提交地址
		curl_setopt ( $ch, CURLOPT_POST, 1 ); //定义提交类型 1：POST ；0：GET
		curl_setopt ( $ch, CURLOPT_HEADER, 0 ); //定义是否显示状态头 1：显示 ； 0：不显示
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header ); //定义请求类型
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true ); //定义是否直接输出返回流
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false ); // 信任任何证书  
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false ); // 检查证书中是否设置域名
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data ); //定义提交的数据
		$response = curl_exec ( $ch ); //接收返回信息
		if (curl_errno ( $ch )) { //出错则显示错误信息		
			return curl_error ( $ch );
		}
		curl_close ( $ch ); //关闭curl链接
		return $response; //显示返回信息
	}
}