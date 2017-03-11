<?php
namespace Visit\Lib\Link;

class MonkeyTest{

	public function create_arr($n){
		for($i=0;$i<$n;$i++){
            $arr[$i] = $i+1;
        }
        return $arr;
	}

	public function count_num($m){
		$num = 0;
		while($num < $m){
			$num++;
		}
	}

	public function do_splice($arr,$m){
		// $num=1;
        $current=0;
        while(sizeof($arr) > 1){
           
           /* if($num == $m){
            	
            	echo '<br/>now current : ',$arr[$current];   

                array_splice($arr,$current,1); 
                if($current >= sizeof($arr)){
                    $current = 0;
                }              
                $num = 1;             
            }
            else{                  
                $num++; 

                if($current+1 >= sizeof($arr)){
                    $current = 0;
                }
                else{
                    $current++;
                }   
            }   */
            $current = ($current+$m-1)%sizeof($arr);
           
            echo '<br/>now current : ',$arr[$current];  

            array_splice($arr,$current,1); 
            $test_num++;  

       // echo '<br/> every current : ',$current,' -- arr length : ',sizeof($arr),' -- num : ',$num;     
        }
        echo '<br/>WHILE RUN TIMES : ',$test_num,'<br/>';
        return $arr;
	}

}
