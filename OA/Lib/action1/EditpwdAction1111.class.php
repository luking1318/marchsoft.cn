<?php
class EditpwdAction extends Action{
	function index(){
		$this->display();
	}
	function upd_pwd(){
		$user=M('user');
		if($_POST){
			$data['user_login']=$_SESSION['user_login'];
			$list=$user->where($data)->find();
			if($list['user_pwd']==md5($_POST[oldpwd])){
				$data1['user_pwd']=md5($_POST[newpwd]);
				if($user->where('user_login='.'"'.$_SESSION['user_login'].'"')->save($data1)){
					echo "1";
				}else{
					echo "3";
				}
			}else{
				echo "3";
			}
		}else{
			echo "3" ;
		}
	}
}

?>