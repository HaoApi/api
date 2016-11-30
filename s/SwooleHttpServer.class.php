<?php
class SwooleHttpServerClass {
	public $server;
	public function __construct() {
		$this->server = new Swoole\Http\Server ( "127.0.0.1", 9502 );
		
		var_dump ( $this->server );
		$this->server->on ( 'Request', array (
				$this,
				'onRequest' 
		) );
		$this->onStart ();
	}
	public function onRequest($req, $res) {
		
		$_get_params = $req->get;
		
		var_dump ( $req );
		
		$res->end("SwooleHttServer");
	}
	public function onStart() {
		$this->server->start ();
	}
}

$obj = new SwooleHttpServerClass ();