<?php
namespace Visit\Controller;
use Think\Controller;

class LinkController extends Controller{

	public function index(){
		$SingleLink = new \Visit\Lib\Link\SingleLink();
		$head = $SingleLink->hero_create();
		for($i=1;$i<10;$i++){
			$hero = $SingleLink->hero_create($i,$i.'tom','ttoomm'.$i);
			$SingleLink->add_hero($head,$hero);
		}		
		// print_r($head);
		$del = $SingleLink->hero_create('7','','');
		$SingleLink->del_hero($head,$del);
		$upd = $SingleLink->hero_create('5','fuc','fck');
		$SingleLink->update_hero($head,$upd);		
		$SingleLink->show_all_hero($head);
	}

	
}