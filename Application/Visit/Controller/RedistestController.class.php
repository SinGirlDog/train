<?php
namespace Visit\Controller;
use Think\Controller;
class RedistestController extends Controller {
    public function index(){

        $val_str = 'B what U wanna B';
        $rad = rand(0,1);
        if($rad){
            $redis = new \Think\Cache\Driver\Redis();
            $val_str .= ' by think';
        }
        else{
            $redis = new \Redis();
            $redis->connect('localhost',6379);
        }
    
        $redis->set('dream',$val_str);
        echo $redis->get('dream');    	
        $redis->close();

       

		$this->display(':Redistest:index');       
       
    }
}