<?php 
class UserAction extends BaseAction{
	function index(){
			import("ORG.Util.Page");// 导入分页类
	
			$user=M('user');
			
			$count=$user->count();	
	
			$page=new Page($count,5);
			$show=$page->show();
			
			/*$sql1="select D.avator,A.user_name,A.user_phone,D.department,D.class,C.Module_name from march_user A ";
			$sql2="left join march_authority B on A.user_phone=B.user_phone ";
			$sql3="left join march_module C on B.module_id=C.module_id ";
			$sql4="left join march_user_info D on A.user_phone=D.user_phone";
			$list=$user->query($sql1.$sql2.$sql3.$sql4);*/
			
			$list=$user
			->field('march_user.user_phone,march_user_info.avator,march_user.user_name,march_user_info.department,march_user_info.class,march_module.module_name')
			->join('march_authority ON march_user.user_phone=march_authority.user_phone')
			->join('march_module ON march_authority.module_id=march_module.module_id')
			->join('march_user_info ON march_user.user_phone=march_user_info.user_phone')
			->limit($page->firstRow.','.$page->listRows)
			->select();
			
			$this->assign("list",$list);
			$this->assign('show',$show);
			$this->display();
		}
		
	/**->order('id desc')->limit($page->firstRow.','.$page->listRows)
	* 修改职位
	* Enter description here ...
	*/
	function operate(){
		if($_POST){
			$user=M('authority');
			if($_POST[module_id]!='007'){
				if(!$user->field('user_phone')->where(array("user_phone"=>"$_POST[user_phone]"))->select()){
					if($user->add($_POST)){
						$this->ajaxReturn($_POST,'',1);
					}else{
						$this->ajaxReturn(0,'',0);
					}
				}else{
					if($user->where(array("user_phone"=>"$_POST[user_phone]"))->save($_POST)){
							$this->ajaxReturn($_POST,'',1);
					}else{
						$this->ajaxReturn(0,'',0);
					}
				}
			}else{
				if($user->where(array("user_phone"=>"$_POST[user_phone]"))->delete()){
					$this->ajaxReturn($_POST,'',1);
				}else{
					$this->ajaxReturn(0,'',0);
				}
			}
		}
			
	}
	
	/*
	 * 删除行数据
	 */
	function del_user(){
		$user=M('user');
		if($_GET){
			if($user->where(array("user_phone"=>"$_GET[user_phone]"))->delete()){
				$this->redirect('index');
			}else{
				$this->redirect('index', array(),1,'只有普通成员可以删除，页面跳转中。。');
			}
		}else{
			$this->redirect('index', array(),1,'删除失败，页面跳转中。。');
		}
	}
	
	/*
	 * 添加数据
	 */
	function add_user(){
		$user=M('user');
			
		if($_POST){
			$data['user_phone']=$_POST[user_phone];
			$data['user_login']=$_POST[user_login];
			$data['user_pwd']=md5($_POST[user_login]);
			$data['level']=$_POST[level];
			if($user->add($data)){
				$user=M('user_info');
				if($user->add($data)){
					echo $_POST[user_login];
				}
			}
		}
	}
	
	function add_user_auth(){
		$user=M('user');
		if($_POST){
			if($user->field('user_login')->where(array("user_login"=>"$_POST[user_login]"))->select()){
				echo "用户已存在";
			}
		}
	}
}

?>