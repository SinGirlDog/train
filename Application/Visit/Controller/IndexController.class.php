<?php
namespace Visit\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

    	$admin = new \Visit\Model\AdminModel();
    	print_r($admin->test_value);
		
		// $this->assign('admin',$admin->test_value);

        $this->test_question_c();

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

    //说艺术公司面试附加题引发的血案
    public function test_question_c(){
        
        for($p=0;$p<10;$p++)
            echo '<br/>';

        $input = '[{a:1,b:2,c:3},{a:4,b:5,c:6}]';
        
        $pro_arr = explode(',',$input);
        $del_a = array_splice($pro_arr,1,1);
        $del_b = array_splice($pro_arr,3,1);  
        $pro_arr = implode(',',$pro_arr);   

        echo '如果原型为普通字符串'.$input.'的话，处理后输出结果为：<br/>';    
        print_r($pro_arr);
        echo '<br/>';

        //if its real
        $arr = array(
            array('a'=>1,'b'=>2,'c'=>3),
            array('a'=>4,'b'=>5,'c'=>6)
        );
        $json_str = json_encode($arr);
        echo '如果原型为JSON字符串的话，应该是这样：<br/>';
        print_r($json_str);
        echo '<br/>';
       
        $arter_jsdec = json_decode($json_str,true);
        echo 'json_decode解码(true)后得到：<br/>';
        print_r($arter_jsdec);
        echo '<br/>';

        echo '<foreach>循环得到：';
        foreach($arter_jsdec as $arter_one){
            print_r($arter_one);
        }
        echo '<br/>';
       
        foreach($arter_jsdec as &$arter_one){                    
            array_splice($arter_one,1,1);  
        }      
        echo '<foreach>循环中取用最开始的的方式删除指定位置元素得到：<br/>';       
        print_r($arter_jsdec);
        echo '<br/>';

        echo '再将处理过的数组重新编码为JSON：<br/>';
        $finally = json_encode($arter_jsdec);
        print_r($finally);
        echo '<br/>';

        echo '最后的最后，验证输出数组$arr的各(3)种方法:<br/>';
        echo 'var_dump($arr):<br/>';
        var_dump($arr);

        echo '<br/>';
        echo 'print_r($arr):<br/>';
        $thi = print_r($arr);

        echo '<br/>';
        echo 'var_export($arr):<br/>';
        var_export($arr);
        echo '<br/>';
        echo '其中print_r()有返回值如下：<br/>';
        var_dump($thi);
       
        echo '<br/>打印时间 echo date(\'Y-m-d H:i:s\');<br/>';
        echo date('Y-m-d H:i:s');
        echo '<br/>打印时间 echo date(\'Y-m-d H:i:s\',time()-86400);<br/>';
        echo date('Y-m-d H:i:s',time()-86400);
        
        for($p=0;$p<10;$p++)
            echo '<br/>';

    }
}