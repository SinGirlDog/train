<?php
namespace Visit\Controller;
use Think\Controller;
class IndexController extends Controller {

    function _initialize(){
        $this->title = 'test-pages';

        $this->left_arr = array(
            'dat-href' => array(
                U('Index/test_question_a'),
                U('Index/test_question_b'),
                U('Index/test_question_c'),
                U('Index/test_question_d',array('m'=>3,'n'=>13)),
                U('Index/test_question_e',array('m'=>3,'n'=>13)),
                U('Index/test_question_f',array('m'=>3,'n'=>13)),
                U('Index/test_question_g'),
                U('Index/test_question_h'),
                U('Index/test_question_i',array('a'=>'get_users','uid'=>'10001')),
                U('Index/test_question_j'),
                U('Index/test_question_circle'),              


                U('Ajaxload/index'),
                U('Bai/index'),
                U('Difftime/countDiff'),
                U('Dir/index'),
                U('Eggs/index'),
                U('Gotcontent/index'),
                U('Link/index'),
                U('Low/index'),
                U('Memcache/index'),
                U('Mscomment/index'),
                U('Redistest/index'),


            ),
            'dat-title' => array(
                '类Some的base',
                '关于foreach($arr as &$v)',
                '从手写版面试题到调试',
                '你是猴子请来的链表吗',
                '猴子听说的谣言',
                '我是猴子请来的数组',
                '九宫格初养成',
                '十位数计算',
                '借口：例',
                '关于九宫格不可不说的往事',
                '一件坏事',

                '畸恋',
                '白',
                '时间差',
                '魔法禁书目录',
                '先有鸡还是先有蛋',
                '获取网址内容',
                '单恋',
                'LOW',
                'memcache-test',
                '关联模型吧',
                'redis-test',
            ),
        );
    }

    public function index(){

		$this->display(':index');
          	
    }

    public function test_question_a(){
        $obj = new \Visit\Lib\Test\Some('where','here');
        $obj->name = 'realName';
        $obj->collr = 'red';

        echo '<pre/>var_dump($obj->name):<br/>';
        var_dump($obj->name);

        echo '<br/>var_dump(isset($obj->name)):<br/>';
        var_dump(isset($obj->name));
        echo '<br/>var_export($obj):<br/>';
        var_export($obj);
    }

    public function test_question_b()
    {
        $arr = array(1,2,3,4,9,6);  
        foreach($arr as &$v){}
        echo '<pre/>';print_r($arr);       
        foreach($arr as $v){}
        echo '<pre/>'; print_r($arr);

        $a = range(1,5);  
        foreach($a as &$b){  
            $b *= $b;  
        }            
        foreach($a as $b){}  
        echo '<pre/>'; print_r($a);
    }

    //说艺术公司面试附加题引发的血案
    public function test_question_c(){
        
        for($p=0;$p<1;$p++)
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
        
        for($p=0;$p<1;$p++)
            echo '<br/>';

    }

    public function test_question_d($m,$n){
         for($p=0;$p<1;$p++)
            echo '<br/>';
       
        $circle_Link = new \Visit\Lib\Link\MonkeyKing();

        $monkey_D_Luffy = $circle_Link->cricle_create();

        $sum = $n;
        for($i=3;$i<=$sum;$i++){
            $circle_Link->add_monkey($i,$monkey_D_Luffy);
        }
        
        $circle_Link->get_king($m,$monkey_D_Luffy);

        $circle_Link->show_all_monkey($monkey_D_Luffy);
       
        // print_r($king);
         
         for($p=0;$p<1;$p++)
            echo '<br/>';
    }

    public function test_question_e($m, $n){
        for($i=2;$i<$n;$i++){
            $r = ($r+$m)%$i;
        }
        echo '神奇的代码执行后得到：',$r+1;

        echo '<br/>此处十分不严谨，当且仅当M=N且均大于1时成立';
    }

    public function test_question_f($m,$n){
        
        $monkey_Test = new \Visit\Lib\Link\MonkeyTest();
        $arr = $monkey_Test->create_arr($n);
        $after_arr = $monkey_Test->do_splice($arr,$m);
        print_r($after_arr);
       
        echo '<br/>';

    }

    public function test_question_circle($start,$end){
        /*I am sorry about the fool function*/
        for($i = $start;$i<=$end;$i++)
        {
            if($i<10){
                $numbers = '0'.$i;
            }
            else {
                if($i<100)
                $numbers = ''.$i;
            }
            echo '<br/>','http://m2.26ts.com/8DM-',$numbers,'.mp4';
        }
    }

    public function test_question_g(){
        
        $Nine = new \Visit\Lib\Test\Nine();       
        $Nine->create_usual_arr(9);
        
        // $Nine->get_rand_solution();
        // $Nine->show_one_solution();

        $Nine->get_all_position();
        $Nine->get_all_solution();
        $Nine->show_all_solution();

    }

    public function test_question_h(){
        $num_a = rand(1000000000,9999999999);
        echo $num_a*$num_a;
    }

    public function test_question_i($a='',$uid=''){
        $Apidemo = new \Visit\Lib\Test\Apidemo();

        $a_arr = array('get_users','get_games_result','upload_avatars','');
        $a = $a_arr[array_rand($a_arr,1)];        
        $uid = rand(10000,10004);

        $res = $Apidemo->hello($a,$uid);

        echo $res;
    }

    public function test_question_j(){
        $Matrix = new \Visit\Lib\Test\Matrix();

        $Matrix->create_base_matrix(5);
        $Matrix->show_matrix('base');
        $Matrix->twist_base_to_mag();
        $Matrix->show_matrix('mag');
        $Matrix->multi_mag_to_several();
        $Matrix->show_matrix('several');
        $Matrix->flip_mag_to_angle();
        $Matrix->show_matrix('angle');
        $Matrix->get_a_res();
        $Matrix->show_matrix('res');
    }
  
}