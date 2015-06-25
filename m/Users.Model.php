<?php
/**
 * 
 * Model模型类，用于数据操作
 * @author Mr.Hao
 * @qq 409328820@qq.com
 * @email 409328820@qq.com
 *
 */
class UsersModel extends Mysql {
	
	//测试查询
	public function findAll() {
		$sql = 'select id from `users` ';
		return $this->get_all ( $sql );
	}
	
	public function changedbFind() {
		//切换DB操作
		$this->useDB ( 'vuser' );
		$sql = 'select * from `user` ';
		return $this->get_all ( $sql );
	}
}