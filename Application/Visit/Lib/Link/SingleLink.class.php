<?php
namespace Visit\Lib\Link;

class Hero{
	
	public $no;
	public $name;
	public $nickname;
	public $next = null;

	public function __construct($no='',$name='',$nickname=''){
		$this->no = $no;
		$this->name = $name;
		$this->nickname = $nickname;
	}
}

class SingleLink{

	public function hero_create($no='',$name='',$nickname=''){
		return new Hero($no,$name,$nickname);
	}
	public function add_hero($head,$hero){
		$cur = $head;
		$flag = false;

		while($cur->next != null){
			if($cur->next->no > $hero->no){
				break;
			}
			else if($cur->next->no == $hero->no){
				$flag = true;
				echo 'The number has been occupied!';
			}

			$cur = $cur->next;
		}

		if($flag == false){
			$hero->next = $cur->next;
			$cur->next = $hero;
		}
	}

	public function del_hero($head,$hero){
		$cur = $head;
		$flag = false;

		while($cur->next != null){
			if($cur->next->no == $hero->no){
				$flag = true;
				break;
			}
			
			$cur = $cur->next;
		}

		if($flag){
			$cur->next = $cur->next->next;			
		}
		else{
			echo 'Which you wanna deleted is not in link at this time
			,please try again later!';
		}
	}

	public function show_all_hero($head){
		$cur = $head;
		while($cur->next != null){
			echo '<br/>',$cur->next->no,
			'--:--',$cur->next->name,
			'--:--',$cur->next->nickname;
			$cur = $cur->next;
		}
	}

	public function update_hero($head,$hero){
		$cur = $head;
		$flag = false;

		while($cur->next != null){
			if($cur->next->no == $hero->no){
				$flag = true;
				break;
			}
			$cur = $cur->next;
		}

		if($flag){
			$cur->next->name = $hero->name;
			$cur->next->nickname = $hero->nickname;
		}
		else{
			echo 'The hero you wanna edited is not in link at this time
			,please try again later!';
		}
	}
}
