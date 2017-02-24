<?php
namespace Visit\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

    	$admin = new \Visit\Model\AdminModel();
    	print_r($admin->test_value);
		
		$this->assign('admin',$admin->test_value);

        $this->test_question_a();

		$this->display(':index');
          	
    }

    public function test_question_a(){
        $obj = new \Visit\Lib\Test\Some('where','here');
        $obj->name = 'realName';
        $obj->collr = 'red';
        var_dump($obj->name);
        var_dump(isset($obj->name));
        var_export($obj);
    }

    public function test_question_b()
    {
        echo '<pre/>';
        $arr = array(1,2,3,4,9,6);  
        foreach($arr as &$v){}
        print_r($arr);       
        foreach($arr as $v){}
        print_r($arr);

        $a = range(1,5);  
        foreach($a as &$b){  
            $b *= $b;  
        }            
        foreach($a as $b){}  
        print_r($a);
    }
}