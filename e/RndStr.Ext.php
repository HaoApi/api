<?php
final class RndStrExt {
	/**
	 * 
	 * 获取随机字符串
	 * @param int $len
	 * @param string $type	1数字 2字符 3数字+字符	 默认1
	 */
	public static function getRandomString($len = 6, $type = '1') {
		if ($type == '1') {
			$str = '0123456789';
		} elseif ($type == '2') {
			$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxzy';
		} elseif ($type == '3') {
			$str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxzy';
		}
		
		$n = $len;
		$len = strlen ( $str ) - 1;
		$s = '';
		for($i = 0; $i < $n; $i ++) {
			$s .= $str [rand ( 0, $len )];
		}
		
		return $s;
	}
}