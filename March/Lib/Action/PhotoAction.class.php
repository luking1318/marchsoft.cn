<?php
class PhotoAction extends Action{
	function index(){
		$photo=M("photo");
		$list=$photo->order('idmarch_photo DESC')->select();
		$this->assign("list",$list);
		$this->display();
	}
	
	function show_photo(){
		if($_GET){
			$photo_list=M('photo_list');
			$list=$photo_list->where(array("parent_photo"=>"$_GET[id]"))->select();
			$this->assign("list",$list);
			$this->display();
		}
	}
	
	function photo_list(){
		if($_GET){
			$this->assign("idmarch",$_GET[idmarch_photo]);
			$this->display();
		}else{
			echo "系统出错！";
		}
	}
}
?>
