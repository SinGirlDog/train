<?php
namespace Visit\Lib\Link;

class Monkey{
	
	public $no;
	// public $role;
	public $next = null;
	public $prev = null;

	public function __construct($no='',$role=''){
		$this->no = $no;
		// $this->name = $name;
	}
}

class MonkeyKing{

	public function create_monkey($no='',$role=''){
		return new Monkey($no,$role);
	}
	public function cricle_create($sum='2'){
		if($sum > 1){
			$head = $this->create_monkey(1);
			$foot = $this->create_monkey(2);
			$head->next = $foot;
			$head->prev = $foot;
			$foot->next = $head;
			$foot->prev = $head;

			return $head;			
		}
		else{
			echo '<br/>The sum number was error!<br/>';
		}
	}

	public function add_monkey($no,$head){
		$foot = $head->prev;
		$the_one = $this->create_monkey($no);
		$foot->next = $the_one;
		$the_one->prev = $foot;
		$the_one->next = $head;
		$head->prev = $the_one;
	}

	public function del_monkey($no,$head){
		$cur = $head;
		$flag = false;

		while($cur->no != $no){
			$cur = $cur->next;
		}

		if($cur->no == $no){
			$this->del_the_monkey($cur);
		}
	}

	public function del_the_monkey($monkey){		
		$last_one = $monkey->prev;
		$next_one = $monkey->next;
		$last_one->next = $next_one;
		$next_one->prev = $last_one;

		echo '<br/>The one : '.$monkey->no;

		return $next_one;		
	}


	public function show_all_monkey($head){
		$cur = $head;

		while($cur->next != $head && $cur->next != null){
			echo '<br/>no : '.$cur->no;
			$cur = $cur->next;
		}
		echo '<br/>no : '.$cur->no;
	}

	public function get_king($limit='0',$head){
		$cur = $head;
		if($limit > 1){
			$count = 1;
			while($count < $limit && $cur->next != $cur){
				$cur = $cur->next;
				$count++;
			}
			if($cur->next == $cur){
				// $this->show_all_monkey($cur);
				$cur->next = null;
				echo '<br/> I am the king --'.$cur->no;

			}
			else{
				$now = $this->del_the_monkey($cur);
				$this->get_king($limit,$now);
			}
		}
		else{
			echo '<br/>The limit number was error!<br/>';			
		}
	}

}
