<?php
namespace Visit\Lib\Test;

class Nine{

	private $an_arr=array(
		 1,20,18,19, 5,
		22,24, 3, 9,16,
		11,12,13,14,15,
		10,17,23, 2, 4,
		21, 7, 8, 6,25,
		
	);

	public function create_usual_arr($n){
		$usual_arr = array();

		for($i = 0;$i < $n;$i++){
            $usual_arr[$i] = $i + 1;
        }

        $this->arr = $usual_arr;
        $this->make_params();

        // return $usual_arr;
	}

	protected function make_params(){
		$arr = $this->arr;
		$this->all_sum = array_sum($arr);
        $this->length = sizeof($arr);
        $this->baseWH = sqrt($this->length);
        $this->middle = $this->all_sum/$this->length;
        $this->magic_sum = $this->middle*$this->baseWH;
        $this->mid_key = intval($this->length/2);
	}

	public function get_rand_solution(){
		
		do{

	        $another_arr = array();
	        $copy_arr = $this->arr;
	        $another_arr[$this->mid_key] = $this->middle;
	        for($i = 0;$i < $this->mid_key;$i++){

	            do{
	                $rand_key = array_rand($copy_arr);
	                $rand_one = $copy_arr[$rand_key];
	            }while(in_array($rand_one,$another_arr));
	           
	            // array_splice($copy_arr, $rand_key,1);
	            $another_arr[$i] = $rand_one;
	            $another_arr[$this->length-1-$i] = $copy_arr[$this->length-1-$rand_key];
	        }        
	        ksort($another_arr);

	        // $cond_h_sum = array_sum(array_slice($another_arr,0,$this->baseWH));
	        $cond_v_sum = 0;
	        $cond_h_sum = 0;
	        for($c = 0;$c < $this->baseWH;$c++){
	        	 $cond_v_sum += $another_arr[$this->baseWH*$c];
	        	 $cond_h_sum += $another_arr[$c];
	        }
	       // $this->show_one_solution($another_arr);
	       // print_r($cond_h_sum);die;
        }while(($this->magic_sum != $cond_h_sum)||
        	($this->magic_sum != $cond_v_sum)  
        );

        $this->an_arr = $another_arr;
	}

	public function show_one_solution($arr=array()){

		$another_arr = $arr ? $arr : $this->an_arr;

		$magic_table_htm = '<table border="1">';
        foreach($another_arr as $key=>$val){
            if($key%$this->baseWH == 0){
                $magic_table_htm .= '<tr>';
            }

            $magic_table_htm .= '<td>'.$val.'</td>';

            if($key%$this->baseWH == $this->baseWH-1){
                $magic_table_htm .= '</tr>';
            }
        }
        $magic_table_htm .= '</table>';
        echo '<br/>',$magic_table_htm;
	}

	public function get_one_solution($pos_arr = array()){

		$some_one = array();
		$some_one[$this->mid_key] = $this->middle;
		$current = 0;
		foreach($pos_arr as $key=>$val){
			$sel_one = $this->arr[$val];
			$some_one[$current] = $sel_one;
	        $some_one[$this->length-1-$current] = $this->magic_sum-$this->middle-$sel_one;
	        $current += 1;
		}

		if(!$this->is_not_same_exist($some_one)){
			return ;
		}

		ksort($some_one);

		if(
			($this->magic_sum == array_sum(array_slice($some_one,0,$this->baseWH))) &&
            ($this->magic_sum == $some_one[0]+$some_one[$this->baseWH]+$some_one[2*$this->baseWH])
          ){
            	$this->all_sol[] = $some_one;
        }
	}

	public function get_all_solution(){

		foreach($this->all_pos as $key=>$one_pos){
			$this->get_one_solution($one_pos);
		}	
		
	}

	public function show_all_solution(){
		
		foreach($this->all_sol as $key=>$one_sol){
			$this->show_one_solution($one_sol);
		}
	}

	public function get_all_position(){

		for($i=0;$i<9;$i++){
			for($j=0;$j<9;$j++){
				for($k=0;$k<9;$k++){
					for($l=0;$l<9;$l++){
						
						$temp = array($i,$j,$k,$l);
						
						if($this->is_not_same_exist($temp)){
							$all_position[] = $temp; 
						}
					}										
				}
			}
		}
		
		$this->all_pos = $all_position;
		// echo '<pre/>'; print_r($all_position);
	}

	protected function is_not_same_exist($arr=array()){
		if(!empty($arr)){
			$len = sizeof($arr);
			$after = array_unique($arr);
			$leng = sizeof($after);
			if($leng == $len){
				return true;
			}
		}

		return  false;
	}
}
