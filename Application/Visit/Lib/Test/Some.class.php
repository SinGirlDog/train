<?php
namespace Visit\Lib\Test;

class SomeOne{
	
	private $properties = [];
	
	public function __set($name,$value){
		// $this->$name = $value;
		$this->properties[$name] = $value;
	}
	public function __get($name){
		// return $this->$name;		
		return $this->properties[$name];
	}
}

class Some{
	
	private $properties = [];
	
	public function __set($name,$value){
		// $this->$name = $value;
		$this->properties[$name] = $value;
	}
	public function __get($name){
		// return $this->$name;		
		return $this->properties[$name];
	}
}