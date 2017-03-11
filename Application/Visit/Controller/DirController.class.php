<?php
namespace Visit\Controller;
use Think\Controller;

class DirController extends Controller{

	public function index(){
		echo 'hello I AM DIR CTRL';
		//$this->dirFind('E:\wamp\www\ECshop\Upload\admin\templates');
		$this->dirFind('E:\KuGou');
	}

	protected function dirFind($dirorg){
		if(is_dir($dirorg)){
			$start = opendir($dirorg);
			while($child = readdir($start)){
				if($child === '.' or $child === '..'){
					;//not print;
				}
				else if(is_dir($dirorg.'\\'.$child)){
					$this->dirFind($dirorg.'\\'.$child);
				}
				else{
					echo $dirorg.'\\'.$child.'<br/>';
					// $this->renameFile($dirorg,$child);
					$this->copyFile($dirorg,$child);
				}

			}
			$stop = closedir($start);
		}
		else{
			echo 'error dir';
		}
		
	}

	protected function renameFile($oldDir,$oldname,$aimDir){
		return false;//for safety;
		$aimDir='E:\wamp\www\train\Application\Shopadmin\View\adm';
		if(is_dir($aimDir)){
			if(rename($oldDir.'\\'.$oldname,$aimDir.'\\'.$oldname.'l')){
				echo 'success rename!';
			}
			else{
				echo 'error rename!';
			}
		}
		else{
			echo 'wrong aimDir!';
		}
		echo '<br/>';

	}

	protected function copyFile($oldDir,$oldname,$aimDir){
		return false;//for safety;		
		$aimDir='E:\wamp\www\ECshop\Upload\admin\templates';
		$newname = basename($oldname,'html').'.htm';
		if(is_dir($aimDir)){
			if(copy($oldDir.'\\'.$oldname,$aimDir.'\\'.$newname)){
				echo 'success copy!';
			}
			else{
				echo 'error copy!';
			}
		}
		else{
			echo 'wrong aimDir!';
		}
		echo '<br/>';

	}
}
