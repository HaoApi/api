<?php
class TestController extends BaseController {
	
	public function testAes() {
		
		$encrypRes = $this->get ( 'encryp' );
		//Aes解密 要执行urldecode防止 aes加密 产生特殊号解析不出来
		$encrypRes = urldecode ( $encrypRes );
		$parseRes = AesExt::decrypt ( $encrypRes, 'test' );
		
		//正确
		var_dump ( $this->getAesKey ( $parseRes, 'a' ) );
		//错误
		var_dump ( $this->getAesKey ( $parseRes, 'd' ) );
	}
	
	public function createAes() {
		$url = $_SERVER ['HTTP_HOST'] . '/haoapi/api/Test/testAes/encryp/';
		$key = 'test';
		$str = 'a=1&b=2&c=3';
		$enStr = AesExt::encrypt ( $str, $key );
		$enStr = urlencode ( $enStr );
		echo $url, $enStr;
	}
}