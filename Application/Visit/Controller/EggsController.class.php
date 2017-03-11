<?php
/*
 * 坑爹的取鸡蛋问题
 **/
namespace Visit\Controller;
use Think\Controller;
class EggsController extends Controller {

	private $divisor_arr = [9,8,7,6,5,4,3,2,1];
	public $remainder_arr = [0,1,0,3,4,1,0,1,0];
	
	public function index(){
		
		$eggs_sum = array();
		for($egg = 3;$egg < 10000;$egg += 2){
			if($egg%9 == 0){
				array_push($eggs_sum,$egg);
			}
		}

		for($div=0;$div<sizeof($this->divisor_arr);$div++){
			
			$eggs_sum = $this->filter(
				$this->divisor_arr[$div],$this->remainder_arr[$div],$eggs_sum);
			
		}
		
		// foreach($eggs_sum as &$egg_eight){
		// 	if($egg_eight%8 != 1){
		// 		$egg_eight = 0;				
		// 	}
		// }

		// foreach($eggs_sum as &$egg_seven){
		// 	if($egg_seven%7 != 0){
		// 		$egg_seven = 0;				
		// 	}
		// }

		// foreach($eggs_sum as &$egg_six){
		// 	if($egg_six%6 != 3){
		// 		$egg_six = 0;				
		// 	}
		// }

		// foreach($eggs_sum as &$egg_five){
		// 	if($egg_five%5 != 4){
		// 		$egg_five = 0;				
		// 	}
		// }

		// foreach($eggs_sum as &$egg_four){
		// 	if($egg_four%4 != 1){
		// 		$egg_four = 0;				
		// 	}
		// }

		// foreach($eggs_sum as &$egg_three){
		// 	if($egg_three%3 != 0){
		// 		$egg_three = 0;				
		// 	}
		// }
		//$eggs_sum = array_unique($eggs_sum);
		print_r($eggs_sum);
		echo '<br/>',$eggs_sum[0],'+N*',$eggs_sum[1]-$eggs_sum[0],'(N：自然数)<br/>';					
		$this->display(':Eggs:index');
	}

	public function filter(int $divisor,int $remainder,array $eggs){	
		$real = array();	
		$num = 0;
		foreach($eggs as &$egg){
			if($egg%$divisor == $remainder){
				$real[$num++] = $egg;				
			}
		}		
		return $real;
	}
	
}