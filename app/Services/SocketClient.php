<?php

namespace App\Services;


class SocketClient{

	public $socket;
	public $result;


	function __construct(){

		$ip = '127.0.0.1';

		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

		socket_bind($this->socket, $ip);

		$this->result = socket_connect($this->socket, $ip, 8012);

	}

	public function sendMessage($channels, $message, $link){

		if (!$this->result) {
			die('cannot connect ' . socket_strerror(socket_last_error()) . PHP_EOL);
		}

		foreach($channels as $channel){
			$message = array('channel' => $channel, 'message' => $message, 'link' => $link);
			$bytes = socket_write($this->socket, json_encode($message));

	
		}
		socket_close($this->socket);
				
	}

	public function message($channel, $message){

		if (!$this->result) {
			die('cannot connect ' . socket_strerror(socket_last_error()) . PHP_EOL);
		}
		
		//sleep(3);

		$msg = array('channel' => $channel, 'message' => $message);
		$bytes = socket_write($this->socket, json_encode($msg));

	
		
				
	}


	public function close(){

		socket_close($this->socket);
	}

}


?>


