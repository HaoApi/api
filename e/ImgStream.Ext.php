<?php
/**
 * 
 * 图片流上传
 * @author MrHao
 *
 */
final class ImgStreamExt {
	
	/**
	 * POST上传图片流
	 */
	public static function uploadImgStream($file = NULL) {
		if (! $file) {
			return false;
		}
		$f = $file ['tmp_name'];
		if (! $f) {
			return false;
		}
		$imgType = $file ['type'];
		$fileSize = filesize ( $f );
		$pictureData = fread ( fopen ( $f, "r" ), $fileSize );
		$fileType = explode ( '/', $imgType );
		$head = array ("Content-Type:" . $fileType ['1'] );
		$res = CurlExt::getHttpPostRes ( $pictureData, "图片流接收地址", $head );
		return $res;
	}

}