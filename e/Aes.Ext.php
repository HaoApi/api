<?php
/**
 * 
 * Aes加密
 * @author Mr.Hao
 * @qq 409328820
 * @email 409328820@qq.com
 *
 */
final class AesExt {
	/**
	 * 加密
	 * @param $input 要加密的字符串
	 * @param $key 密钥
	 */
	public static function encrypt($input, $key) {
		$size = mcrypt_get_block_size ( MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB );
		$input = self::pkcs5_pad ( $input, $size );
		$td = mcrypt_module_open ( MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '' );
		$iv = mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
		mcrypt_generic_init ( $td, $key, $iv );
		$data = mcrypt_generic ( $td, $input );
		mcrypt_generic_deinit ( $td );
		mcrypt_module_close ( $td );
		$data = base64_encode ( $data );
		$data = str_replace ( '/', '@-@', $data );
		$data = str_replace ( '=', '@|@', $data );
		return $data;
	}
	
	private static function pkcs5_pad($text, $blocksize) {
		$pad = $blocksize - (strlen ( $text ) % $blocksize);
		return $text . str_repeat ( chr ( $pad ), $pad );
	}
	
	/**
	 * 解密
	 * @param $sStr 加密串
	 * @param $sKey 密钥
	 */
	public static function decrypt($sStr, $sKey) {
		$sStr = str_replace ( '@-@', '/', $sStr );
		$sStr = str_replace ( '@|@', '=', $sStr );
		$decrypted = mcrypt_decrypt ( MCRYPT_RIJNDAEL_128, $sKey, base64_decode ( $sStr ), MCRYPT_MODE_ECB );
		$dec_s = strlen ( $decrypted );
		$padding = ord ( $decrypted [$dec_s - 1] );
		$decrypted = substr ( $decrypted, 0, - $padding );
		return $decrypted;
	}
}