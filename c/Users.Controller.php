<?php
class UsersController extends BaseController {
	public function test() {
		//得到参数
		//$this->get('参数名');
		

		$this->callback ( 200, '操作成功', $res );
	
	}
	
	public function test1() {
		//调用模型
		$uModel = $this->M ( 'Users' );
		//调用模型方法
		$res = $uModel->findAll ();
		
		$this->callback ( 200, '操作成功', $res );
	}
	
	public function testdb() {
		//测试切换db操作
		$uModel = $this->M ( 'Users' );
		$res = $uModel->changedbFind ();
		
		$this->callback ( 200, '操作成功', $res );
	}
}