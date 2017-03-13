<?php
namespace Visit\Lib\Test;

class Matrix{

	public function create_base_matrix($n){
		$this->base_N = $n;
		$matrix = array();
		for($i=0;$i<$n;$i++){
			for($j=0;$j<$n;$j++){
				$matrix[$i][$j] = $j+1;
			}
		}

		$this->base_matrix = $matrix;
	}

	public function show_matrix($which='base'){
		switch ($which) {
			case 'base':
				$arr = $this->base_matrix;
				break;
			case 'mag':
				$arr = $this->mag_matrix;
				break;

			case 'several':
				$arr = $this->several_matrix;
				break;
			case 'angle':
				$arr = $this->angle_matrix;
				break;
			case 'res':
				$arr = $this->res_matrix;
				break;			
			default:
				# code...
				break;
		};		

		$magic_table_htm = '<table border="1">';
        foreach($arr as $h_key=>$h_val){
        	$magic_table_htm .= '<tr>';
        	foreach($h_val as $v_key=>$v_val){
 				$magic_table_htm .= '<td>'.$v_val.'</td>';
        	}
        	$magic_table_htm .= '</tr>';            
        }
        $magic_table_htm .= '</table>';

        echo '<br/>',$magic_table_htm;
	}

	public function twist_base_to_mag(){
		$arr = $this->base_matrix;

		foreach ($arr as $key => &$val) {
			$cnt = $key;
			while($cnt++ <= $this->base_N){
				$last = array_shift($val);
				array_push($val,$last);
			}
		}

		for($i=0;$i < $this->base_N; $i++){
			for($j=0; $j < $this->base_N; $j++){ 	
				$arr_new[$i][$j] = $arr[$j][$i];	
			}
		}

		foreach ($arr_new as $key => &$val) {
			$cnt = $key;
			while($cnt++ <= $this->base_N){
				$last = array_shift($val);
				array_push($val,$last);
			}
		}

		$this->mag_matrix = $arr_new;
	}

	public function multi_mag_to_several(){
		
		$arr = $this->mag_matrix;

		foreach($arr as $h_key=>&$h_val){
			foreach ($h_val as $v_key => &$v_val) {
				$v_val = $this->base_N*($v_val-1);
			}
		}

		$this->several_matrix = $arr;
	}

	public function right_mag_to_angle(){//直角旋转
		$arr = $this->mag_matrix;

		for($i=0;$i < $this->base_N; $i++){
			for($j=0; $j < $this->base_N; $j++){ 	
				$arr_right[$i][$j] = $arr[$j][$i];	
			}
		}

		$this->angle_matrix = $arr_right;
	}

	public function flip_mag_to_angle(){//左右翻转
		$arr = $this->mag_matrix;

		for($i=0;$i < $this->base_N; $i++){
			for($j=0; $j < $this->base_N; $j++){ 	
				$arr_right[$i][$j] = $arr[$i][$this->base_N-$j-1];	
			}
		}

		$this->angle_matrix = $arr_right;
	}

	public function get_a_res(){
		$angle = $this->angle_matrix;
		$several = $this->several_matrix;
		$res = array();
		for($i=0;$i < $this->base_N; $i++){
			for($j=0; $j < $this->base_N; $j++){ 	
				$res[$i][$j] = $several[$i][$j]+$angle[$i][$j];	
			}
		}
		$this->res_matrix = $res;
	}
}